<?php
/**
 * Restrict plugin for Craft CMS 3.x
 *
 * Restrict access to the CP based on a IP whitelist
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\restrict\models;

use superbig\restrict\Restrict;

use Craft;
use craft\base\Model;

/**
 * @author    Superbig
 * @package   Restrict
 * @since     2.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Enable the plugin
     *
     * @var bool
     */
    public $enabled = true;

    /**
     * Allow logged in admins to skip whitelist
     *
     * @var bool
     */
    public $allowAdmins = true;

    /**
     * URL you want to redirect to when a visitor gets denied
     *
     * @var string
     */
    public $redirectUrl = '';

    /**
     * Template you want to show to a visitor that gets denied
     *
     * @var string
     */
    public $template = '';

    /**
     * List of IPs to whitelist
     * @var array
     */
    public $ipWhitelist = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [ 'enabled', 'boolean' ],
            [ 'redirectUrl', 'string' ],
            [ 'template', 'string' ],
            [ 'allowAdmins', 'boolean' ],

            [ 'enabled', 'default', 'value' => false ],
            [ 'redirectUrl', 'default', 'value' => '' ],
            [ 'template', 'default', 'value' => '' ],
            [ 'allowAdmins', 'default', 'value' => false ],
            [ 'ipWhitelist', 'default', 'value' => [] ],
        ];
    }
}
