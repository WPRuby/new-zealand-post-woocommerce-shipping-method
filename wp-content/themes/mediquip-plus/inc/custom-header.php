<?php
/**
 * @package Mediquip Plus
 * Setup the WordPress core custom header feature.
 *
 * @uses mediquip_plus_header_style()
 */
function mediquip_plus_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'mediquip_plus_custom_header_args', array(		
		'default-text-color'     => 'fff',
		'width'                  => 1400,
		'height'                 => 280,
		'wp-head-callback'       => 'mediquip_plus_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'mediquip_plus_custom_header_setup' );

if ( ! function_exists( 'mediquip_plus_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see mediquip_plus_custom_header_setup().
 */
function mediquip_plus_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php 
}
endif; // mediquip_plus_header_style