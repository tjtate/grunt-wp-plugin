<?php
/**
 * Plugin Name: {%= title %}
 * Plugin URI:  {%= homepage %}
 * Description: {%= description %}
 * Version:     0.1.0
 * Author:      {%= author_name %}
 * Author URI:  {%= author_url %}
 * License:     GPLv2+
 * Text Domain: {%= prefix %}
 * Domain Path: /languages
 */

/**
 * Copyright (c) {%= grunt.template.today('yyyy') %} {%= author_name %} (email : {%= author_email %})
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using grunt-wp-plugin
 * Copyright (c) 2013 10up, LLC
 * https://github.com/10up/grunt-wp-plugin
 */

// Useful global constants
define( '{%= prefix_caps %}_VERSION', '0.1.0' );
define( '{%= prefix_caps %}_URL',     plugin_dir_url( __FILE__ ) );
define( '{%= prefix_caps %}_PATH',    dirname( __FILE__ ) . '/' );

class {%= className %} {

	function __construct() {
		$locale = apply_filters( 'plugin_locale', get_locale(), '{%= prefix %}' );
		load_textdomain( '{%= prefix %}', WP_LANG_DIR . '/{%= prefix %}/{%= prefix %}-' . $locale . '.mo' );
		load_plugin_textdomain( '{%= prefix %}', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		register_activation_hook( __FILE__, array( &$this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );
	}

	function activate() {

		flush_rewrite_rules();
	}

	function deactivate() {

	}

	function rename_me() {

	}

	function rename_me_too() {

	}

	function getTransient( $transient ) {
		if ( false === ( $variable = get_transient( $transient ) ) ) {

			set_transient( $transient, $variable, 60*60 );
		}
		return $variable
	}
}
// Have a nice day!
${%= className %} = new {%= className %};