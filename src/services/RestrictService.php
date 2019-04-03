<?php
/**
 * Restrict plugin for Craft CMS 3.x
 *
 * Restrict access to the CP based on a IP whitelist
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\restrict\services;

use craft\web\View;
use ErrorException;
use yii\web\HttpException;
use superbig\restrict\models\Settings;
use superbig\restrict\Restrict;

use Craft;
use craft\base\Component;
use Dxw\CIDR\IP;

/**
 * @author    Superbig
 * @package   Restrict
 * @since     2.0.0
 */
class RestrictService extends Component
{
    // Public Methods
    // =========================================================================

    public function check ()
    {
        // Restrict access if enabled and there is IPs in the whitelist
        $settings = Restrict::$plugin->getSettings();

        if ( $settings->enabled ) {
            $ip          = Craft::$app->request->getUserIP();
            $redirectUrl = $settings->redirectUrl;
            $template    = $settings->template;
            $whitelist   = $settings->ipWhitelist;
            $allowAdmins = $settings->allowAdmins;

            // Check for CloudFlare IP
            if ( isset($_SERVER['HTTP_CF_CONNECTING_IP']) ) {
                $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
            }

            // Skip for admins if enabled
            if ( $allowAdmins && Craft::$app->user->getIsAdmin() ) {
                return true;
            }

            // If whitelist has one or more IP address values, check the array
            if ( count($whitelist) > 0 ) {

                foreach ( $whitelist as $address ) {

                    $result = IP::contains($address, $ip);

                    if ( $result->isErr() ) {
                        throw new ErrorException(Craft::t('restrict', 'A malformed IP address value was found in the whitelist.'));
                    }

                    $match = $result->unwrap();

                    // The current IP address matched a value in the whitelist
                    if ( $match ) {
                        return true;
                    }
                }

                // Should we redirect?
                if ( !empty($redirectUrl) ) {
                    Craft::$app->response->redirect($redirectUrl);
                    Craft::$app->end();
                }
                elseif ( !empty($template) ) {
                    $oldMode = \Craft::$app->view->getTemplateMode();

                    Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_SITE);

                    $html = Craft::$app->view->renderTemplate($template);

                    Craft::$app->view->setTemplateMode($oldMode);

                    echo $html;

                    Craft::$app->end();
                }
                else {
                    throw new HttpException(403, Craft::t('restrict', 'Access to the control panel is restricted.'));
                }
            }
        }

    }
}
