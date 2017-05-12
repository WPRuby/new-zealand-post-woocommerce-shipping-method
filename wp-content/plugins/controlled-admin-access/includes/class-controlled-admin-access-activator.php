<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wpruby.com
 * @since      1.0.0
 *
 * @package    Controlled_Admin_Access
 * @subpackage Controlled_Admin_Access/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Controlled_Admin_Access
 * @subpackage Controlled_Admin_Access/includes
 * @author     Waseem Senjer <waseem.senjer@gmail.com>
 */
class Controlled_Admin_Access_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		/*add_role(
		    'plugin_developer',
		    __( 'Plugin Developer' ),
		    array(
		        'read'         => true,  // true allows this capability
		        'edit_posts'   => true,
		        'delete_posts' => false, // Use false to explicitly deny
		    )
		);
		add_role(
		    'theme_developer',
		    __( 'Theme Developer' ),
		    array(
		        'read'         => true,  // true allows this capability
		        'edit_posts'   => true,
		        'delete_posts' => false, // Use false to explicitly deny
		    )
		);
		add_role(
		    'support_representative',
		    __( 'Support Representative' ),
		    array(
		        'read'         => true,  // true allows this capability
		        'edit_posts'   => true,
		        'delete_posts' => false, // Use false to explicitly deny
		    )
		);*/
	}

}
