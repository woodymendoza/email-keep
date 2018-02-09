<?php
/**
 * Plugin Name:       Email Keep
 * Plugin URI:        https://www.intricateweb.com/blog/email-keep-wordpress-plugin/
 * Description:       Keep a copy of any email sent from the site. A perfect way to not lose important leads due to email delivery issues.
 * Version:           1.1
 * Author:            IntricateWeb
 * Author URI:        https://www.intricateweb.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       email-keep
 * Domain Path:       /languages
 */

namespace EMAIL_KEEP;

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// The class that contains the plugin info.
require_once plugin_dir_path(__FILE__) . 'includes/class-info.php';

/**
 * The code that runs during plugin activation.
 */
function activation() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-activator.php';
    Activator::activate();
}
register_activation_hook(__FILE__, __NAMESPACE__ . '\\activation');

/**
 * Run the plugin.
 */
function run() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-plugin.php';
    $plugin = new Plugin();
    $plugin->run();
}
run();
