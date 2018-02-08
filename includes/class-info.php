<?php

namespace EMAIL_KEEP;

/**
 * The class containing information about the plugin.
 */
class Info
{
    /**
     * The plugin slug.
     *
     * @var string
     */
    const SLUG = 'email-keep';

    /**
     * The plugin version.
     *
     * @var string
     */
    const VERSION = '1.0';

    /**
     * The nae for the entry in the options table.
     *
     * @var string
     */
    const OPTION_NAME = 'email_keep_settings';

    /**
     * The URL where your update server is located (uses wp-update-server).
     *
     * @var string
     */
    const UPDATE_URL = 'https://example.com/';

    /**
     * Retrieves the plugin title from the main plugin file.
     *
     * @return string The plugin title
     */
    public static function get_plugin_title() {
        $path = plugin_dir_path(dirname(__FILE__)).self::SLUG.'.php';
        return get_plugin_data($path)['Name'];
    }
}
