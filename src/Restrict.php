<?php
/**
 * Restrict plugin for Craft CMS 3.x
 *
 * Restrict access to the CP based on a IP whitelist
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\restrict;

use superbig\restrict\services\RestrictService as RestrictServiceService;
use superbig\restrict\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class Restrict
 *
 * @author    Superbig
 * @package   Restrict
 * @since     2.0.0
 *
 * @property RestrictServiceService $restrictService
 * @property Settings               $settings
 * @method   Settings getSettings()
 *
 */
class Restrict extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Restrict
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init ()
    {
        parent::init();
        self::$plugin = $this;

        $this->restrictService->check();

        Craft::info(
            Craft::t(
                'restrict',
                '{name} plugin loaded',
                [ 'name' => $this->name ]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel ()
    {
        return new Settings();
    }
}
