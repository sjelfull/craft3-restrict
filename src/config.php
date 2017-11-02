<?php
/**
 * Restrict plugin for Craft CMS 3.x
 *
 * Restrict access to the CP based on a IP whitelist
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

/**
 * Restrict config.php
 *
 * This file exists only as a template for the Restrict settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'restrict.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [
    'enabled'     => true,

    // Add any IPs you want to be able to access the CP
    'ipWhitelist' => [ '::1', '127.0.0.1' ],

    // Logged in admins can bypass the whitelist
    'allowAdmins' => true,

    // By default, the plugin will throw a exception if the IP isn't in the whitelist
    // If you want to redirect to an url instead, set it here
    'redirectUrl' => null,

    // Or you want to render a template, set it here
    'template'    => null
];
