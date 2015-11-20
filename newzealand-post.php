<?php
/* @wordpress-plugin
 * Plugin Name:       WooCommerce New Zealand Post Shipping Method
 * Plugin URI:        https://waseem-senjer.com/
 * Description:       WooCommerce New Zealand Post Shipping Method.
 * Version:           1.0.0
 * Author:            Waseem Senjer
 * Author URI:        https://waseem-senjer.com
 * Text Domain:       woocommerce-new-zealand-post-shipping-method
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/wsenjer/new-zealand-post-woocommerce-shipping-method
 */

define('NZPOST_URL', plugin_dir_url(__FILE__));

$active_plugins = apply_filters('active_plugins', get_option('active_plugins'));
if(in_array('woocommerce/woocommerce.php', $active_plugins)){


	add_filter('woocommerce_shipping_methods', 'add_new_zealand_post_post_method');
	function add_new_zealand_post_post_method( $methods ){
		$methods[] = 'WC_New_Zealand_Post_Shipping_Method';
		return $methods; 
	}

	add_action('woocommerce_shipping_init', 'init_zealand_post');
	function init_zealand_post( ){
		require 'class-newzealand-post.php';
	}

}