<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://sejoli.co.id
 * @since             1.0.0
 * @package           Sejoli_Automatorwp
 *
 * @wordpress-plugin
 * Plugin Name:       Sejoli - AutomatorWP
 * Plugin URI:        https://https://sejoli.co.id
 * Description:       Integrate Sejoli Premium Membership plugin with AutomatorWP.
 * Version:           1.0.0
 * Author:            Sejoli Team
 * Author URI:        https://https://sejoli.co.id
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sejoli-automatorwp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SEJOLI_AUTOMATORWP_VERSION', '1.0.0' );
define( 'SEJOLI_AUTOMATORWP_DIR', plugin_dir_path( __FILE__ ) );
define( 'SEJOLI_AUTOMATORWP_URL', plugin_dir_url( __FILE__ ) );

add_action('muplugins_loaded', 'sejoli_automatorwp_check_required_plugin');

function sejoli_automatorwp_check_required_plugin() {

    if(!defined('SEJOLISA_VERSION') && !defined('AUTOMATORWP_VER')) :

        add_action('admin_notices', 'sejoli_automatorwp_notice_functions');

        function sejoli_automatorwp_notice_functions() {
            ?><div class='notice notice-error'>
            <p><?php _e('Anda belum menginstall atau mengaktifkan plugin SEJOLI & AUTOMATORWP!.', 'sejoli-automatorwp'); ?></p>
            </div><?php
        }

        return;

    endif;

}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sejoli-automatorwp-activator.php
 */
function activate_sejoli_automatorwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sejoli-automatorwp-activator.php';
	Sejoli_Automatorwp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sejoli-automatorwp-deactivator.php
 */
function deactivate_sejoli_automatorwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sejoli-automatorwp-deactivator.php';
	Sejoli_Automatorwp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sejoli_automatorwp' );
register_deactivation_hook( __FILE__, 'deactivate_sejoli_automatorwp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sejoli-automatorwp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sejoli_automatorwp() {

	$plugin = new Sejoli_Automatorwp();
	$plugin->run();

}

run_sejoli_automatorwp();
