# Restrict plugin for Craft CMS 3.x

Restrict access to the CP based on a IP whitelist

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require sjelfull/restrict

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Restrict.

## Configuring Restrict

```php
<?php
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
```

## Using Restrict

1. Copy the sample config file `restrict.php` into Craft's config folder, by default `craft/config`.
2. Add the IPs you want to allow access to the CP, and change the other settings as you see fit.

Brought to you by [Superbig](https://superbig.co)
