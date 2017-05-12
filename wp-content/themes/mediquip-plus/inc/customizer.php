<?php
/**
 * Mediquip Plus Theme Customizer
 *
 * @package Mediquip Plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mediquip_plus_customize_register( $wp_customize ) {

	function mediquip_plus_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';	
	
	$wp_customize->add_setting('mediquip_plus_color_scheme',array(
			'default'	=> '#0796D0',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'mediquip_plus_color_scheme',array(
			'label' => __('Color Options','mediquip-plus'),			
			 'description'	=> __('More color options in PRO Version','mediquip-plus'),	
			'section' => 'colors',
			'settings' => 'mediquip_plus_color_scheme'
		))
	);
	
	$wp_customize->add_setting('mediquip_plus_hide_titledesc',array(
			'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'mediquip_plus_hide_titledesc', array(
    	   'section'   => 'title_tagline',    	 
		   'label'	=> __('Check to hide Site Title and Tagline','mediquip-plus'),
    	   'type'      => 'checkbox',
		   'priority' => 40,
     )); //Site Layout Section
	 
	 //mediquip Theme Options
	$wp_customize->add_panel( 'mediquip_plus_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'mediquip-plus' ),		
	) ); 
	
	//Site Layout Section
	$wp_customize->add_section('mediquip_plus_site_layoutsec',array(
			'title'	=> __('Site Layout','mediquip-plus'),			
			'priority'	=> 1,
			'panel' => 'mediquip_plus_panel_area',
	));		
	
	$wp_customize->add_setting('mediquip_plus_box_layout',array(
			'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'mediquip_plus_box_layout', array(
    	   'section'   => 'mediquip_plus_site_layoutsec',    	 
		   'label'	=> __('Check to Box Layout','mediquip-plus'),
    	   'type'      => 'checkbox'
     )); //Site Layout Section 
	 
	 // Slider Section		
	$wp_customize->add_section('mediquip_plus_slider_section', array(
            'title' => __('Homepage Slider', 'mediquip-plus'),
            'priority' => null,
			'description'	=> __('Reccomnded Featured Image Size ( 1400x600 )','mediquip-plus'),   
			'panel' => 'mediquip_plus_panel_area',         			
     ));
	
	$wp_customize->add_setting('mediquip_plus_pagecolumn11',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('mediquip_plus_pagecolumn11',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','mediquip-plus'),
			'section'	=> 'mediquip_plus_slider_section'
	));	
	
	$wp_customize->add_setting('mediquip_plus_pagecolumn12',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('mediquip_plus_pagecolumn12',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','mediquip-plus'),
			'section'	=> 'mediquip_plus_slider_section'
	));	
	
	$wp_customize->add_setting('mediquip_plus_pagecolumn13',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('mediquip_plus_pagecolumn13',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','mediquip-plus'),
			'section'	=> 'mediquip_plus_slider_section'
	));	// Slider Section
	
	$wp_customize->add_setting('mediquip_plus_disabled_slides',array(
				'default' => true,
				'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'mediquip_plus_disabled_slides', array(
			   'settings' => 'mediquip_plus_disabled_slides',
			   'section'   => 'mediquip_plus_slider_section',
			   'label'     => __('Uncheck To Enable This Section','mediquip-plus'),
			   'type'      => 'checkbox'
	 ));//Disable Slider Section	 
	
	
	
	// Home Three Boxes Section 	
	$wp_customize->add_section('mediquip_plus_sectionsecond', array(
		'title'	=> __('Services Section','mediquip-plus'),
		'description'	=> __('Select Pages from the dropdown for homepage four boxes section','mediquip-plus'),
		'priority'	=> null,
		'panel' => 'mediquip_plus_panel_area',
	));	
	
	
	$wp_customize->add_setting('mediquip_plus_pageboxes1',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'mediquip_plus_pageboxes1',array('type' => 'dropdown-pages',			
			'section' => 'mediquip_plus_sectionsecond',
	));	
	
	
	$wp_customize->add_setting('mediquip_plus_pageboxes2',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'mediquip_plus_pageboxes2',array('type' => 'dropdown-pages',			
			'section' => 'mediquip_plus_sectionsecond',
	));
	
	$wp_customize->add_setting('mediquip_plus_pageboxes3',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'mediquip_plus_pageboxes3',array('type' => 'dropdown-pages',			
			'section' => 'mediquip_plus_sectionsecond',
	));
	
	$wp_customize->add_setting('mediquip_plus_pageboxes4',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'mediquip_plus_pageboxes4',array('type' => 'dropdown-pages',			
			'section' => 'mediquip_plus_sectionsecond',
	));//end four column page boxes
	
	$wp_customize->add_setting('mediquip_plus_disabled_pgboxes',array(
			'default' => true,
			'sanitize_callback' => 'mediquip_plus_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'mediquip_plus_disabled_pgboxes', array(
			   'settings' => 'mediquip_plus_disabled_pgboxes',
			   'section'   => 'mediquip_plus_sectionsecond',
			   'label'     => __('Uncheck To Enable This Section','mediquip-plus'),
			   'type'      => 'checkbox'
	 ));//Disable Homepage boxes Section		
			
}
add_action( 'customize_register', 'mediquip_plus_customize_register' );

function mediquip_plus_custom_css(){ 
		?>
        	<style type="text/css"> 					
					a, .listarticle h2 a:hover,
					#sidebar ul li a:hover,								
					.ftr-4-box ul li a:hover, .ftr-4-box ul li.current_page_item a,									
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a,					
					.page4box:hover h3,				
					.page4box:hover h3 a,
					.ftr-4-box h5 span,
					.ftr-4-box .social-icons a:hover,
					.copywrap a,
					.logo a,
					.postmeta a:hover
					{ color:<?php echo esc_html( get_theme_mod('mediquip_plus_color_scheme','#0796D0')); ?>;}
					 
					
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					h2.headingtitle:after,	
					.page4box:hover .pagemore,
					.slidemore,
					.headerInfo,			
					.nivo-controlNav a.active,					
					.wpcf7 input[type='submit'],
					#sidebar .search-form input.search-submit								
					{ background-color:<?php echo esc_html( get_theme_mod('mediquip_plus_color_scheme','#0796D0')); ?>;}
					
						
					.page4box:hover .pagemore,				
					.header					
					{ border-color:<?php echo esc_html( get_theme_mod('mediquip_plus_color_scheme','#0796D0')); ?>;}
					
			</style> 
<?php
}
         
add_action('wp_head','mediquip_plus_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mediquip_plus_customize_preview_js() {
	wp_enqueue_script( 'mediquip_plus_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'mediquip_plus_customize_preview_js' );