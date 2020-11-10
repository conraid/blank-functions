<?php
/**
 * Blank functions.php for WordPress for my personal and particolar use.
 *
 * Very useful when using Oxygen Builder.
 *
 * PHP version 7
 *
 * @category  Wordpress_Plugin
 * @package   Blank_Functions
 * @author    Corrado Franco <conraid@linux.it>
 * @copyright 2020 Corrado Franco
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-3.0.html GPL-3
 * @link      https://github.com/conraid/blank-functions
 */

/*
Plugin Name: Blank Functions
Plugin URI: https://github.com/conraid/blank-functions
Description: Blank functions.php for WordPress for my personal and particolar use.
Version: 1.1.0
Author: Corrado Franco <conraid@linux.it>
Author URI: http://conraid.net
License: GPL-3
Text Domain: blank-functions
*/

/**
 * Copyright 2020 Corrado Franco <conraid@linux.it>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Ex. Loads code after theme setup.
 */
function blank_functions_after_setup_theme() {
	// CODE.
}

// add_action( 'after_setup_theme', 'blank_functions_after_setup_theme' );


/**
 * Loads js & css
 */
function custom_enqueue_files() {
	// Loads a CSS file in the head.
	wp_enqueue_style( 'style', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/css/test.css', '', '1.0.0', true );

	// Loads JS script in the footer.
	wp_enqueue_script( 'script', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/js/test.js', '', '1.0.0', true );

	// Load JQuery script
	wp_enqueue_script( 'script', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/js/jquery-test.js', array( 'jquery' ), 1.0, true );
}
// add_action( 'wp_enqueue_scripts', 'custom_enqueue_files' );

/**
 * Replate template with other. For ex. cart.php in Woocommerce
 *
 * @param string $template      Default template file path.
 * @param string $template_name Template file slug.
 * @param string $template_path Template file name.
 *
 * @return string The new Template file path.
 */
function bf_woo_template( $template, $template_name, $template_path ) {

	switch ( basename( $template ) ) {
		case 'cart.php':
			$template = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'woocommerce/cart/cart.php';
			break;
	}

	return $template;
}
// add_filter( 'woocommerce_locate_template', 'bf_woo_template', 10, 3 );

/**
 * If you want to override a number of files and do not want to specify the file names/paths each time.
 * This is useful for replicating the same theme override method.
 *
 * @param string $template      Default template file path.
 * @param string $template_name Template file slug.
 * @param string $template_path Template file name.
 *
 * @return string The new Template file path.
 */
function bf_woo_templates( $template, $template_name, $template_path ) {

	$template_directory = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'woocommerce/';
	$path               = $template_directory . $template_name;

	return file_exists( $path ) ? $path : $template;

}
// add_filter( 'woocommerce_locate_template', 'bf_woo_templates', 10, 3 );
