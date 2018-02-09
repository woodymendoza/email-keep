<?php

namespace EMAIL_KEEP;

/**
 * This class defines all code necessary to run during the plugin's activation.
 */
class Activator
{
    /**
     * Sets the default options in the options table on activation.
     */
    public static function activate() {

        $option_name = INFO::OPTION_NAME;
        if (empty(get_option($option_name))) {
            $default_options = [
                'is-active' => 'yes',
                'is-active-frontend' => 'yes',
                'is-active-admin' => 'yes',
            ];
            update_option($option_name, $default_options);
        }

        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'email_keep';

        $sql = "CREATE TABLE ".$table_name." (
              `email_keep_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `to` varchar(200) DEFAULT NULL,
              `from` varchar(200) DEFAULT NULL,
              `subject` varchar(200) DEFAULT NULL,
              `message` text,
              `status` enum('new','read','deleted') DEFAULT 'new',
              `type` enum('frontend','admin') DEFAULT 'frontend',
              `date` datetime DEFAULT NULL,
              `additional_values` text,
              PRIMARY KEY (`email_keep_id`)
            ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}
