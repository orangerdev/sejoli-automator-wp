<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://sejoli.co.id
 * @since      1.0.0
 *
 * @package    Sejoli_Automatorwp
 * @subpackage Sejoli_Automatorwp/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sejoli_Automatorwp
 * @subpackage Sejoli_Automatorwp/includes
 * @author     Sejoli Team <asd.zakky@gmail.com>
 */
class Sejoli_Automatorwp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sejoli-automatorwp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
