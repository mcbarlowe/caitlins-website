<?php
/**
 *zyloplus Theme Customizer
 *
 * @package Zyloplus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zyloplus_customize_register( $wp_customize ) {	
	function zyloplus_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	function zyloplus_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';		
	
	$wp_customize->add_setting('zyloplus_color_scheme',array(
			'default'	=> '#dd3333',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'zyloplus_color_scheme',array(
			'label' => __('Color Scheme','zyloplus'),			
			 'description'	=> __('More color options in PRO Version','zyloplus'),
			'section' => 'colors',
			'settings' => 'zyloplus_color_scheme'
		))
	);	
	//Zyloplus Theme Options
	$wp_customize->add_panel( 'zyloplus_panel_id', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'zyloplus' ),		
	) );	
	//Site Layout Section
	$wp_customize->add_section('zyloplus_site_layout_sec',array(
			'title'	=> __('Site Layout','zyloplus'),			
			'priority'	=> 1,
			'panel' => 'zyloplus_panel_id',
	));			
	$wp_customize->add_setting('zyloplus_box_layout',array(
			'sanitize_callback' => 'zyloplus_sanitize_checkbox',
	));	 
	$wp_customize->add_control( 'zyloplus_box_layout', array(
    	   'section'   => 'zyloplus_site_layout_sec',    	 
		   'label'	=> __('Check to Box Layout','zyloplus'),
    	   'type'      => 'checkbox'
     )); //Site Layout Section	
	// Slider Section		
	$wp_customize->add_section('zyloplus_slider_section', array(
            'title' => __('Homepage Slider', 'zyloplus'),
            'priority' => null,
			'description'	=> __('Featured Image Size Should be same ( 1400x600 ) More slider settings available in PRO Version.','zyloplus'),    
			'panel' => 'zyloplus_panel_id',        			
     ));	
	$wp_customize->add_setting('zyloplus_pagesetting7',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'zyloplus_sanitize_dropdown_pages'
	));	
	$wp_customize->add_control('zyloplus_pagesetting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','zyloplus'),
			'section'	=> 'zyloplus_slider_section'
	));		
	$wp_customize->add_setting('zyloplus_pagesetting8',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'zyloplus_sanitize_dropdown_pages'
	));	
	$wp_customize->add_control('zyloplus_pagesetting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','zyloplus'),
			'section'	=> 'zyloplus_slider_section'
	));		
	$wp_customize->add_setting('zyloplus_pagesetting9',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'zyloplus_sanitize_dropdown_pages'
	));	
	$wp_customize->add_control('zyloplus_pagesetting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','zyloplus'),
			'section'	=> 'zyloplus_slider_section'
	));	// Slider Section	
	$wp_customize->add_setting('zyloplus_disabled_slides',array(
				'default' => true,
				'sanitize_callback' => 'zyloplus_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	
	$wp_customize->add_control( 'zyloplus_disabled_slides', array(
			   'settings' => 'zyloplus_disabled_slides',
			   'section'   => 'zyloplus_slider_section',
			   'label'     => __('Uncheck To Enable This Section','zyloplus'),
			   'type'      => 'checkbox'
	 ));//Disable Slider Section	
	// Home Four Boxes Section 	
	$wp_customize->add_section('zyloplus_sectionsecond', array(
		'title'	=> __('Page Boxes Section','zyloplus'),
		'description'	=> __('Select Pages from the dropdown for page boxes section','zyloplus'),
		'priority'	=> null,
		'panel' => 'zyloplus_panel_id',
	));		
	$wp_customize->add_setting('zyloplus_whychooseus_title',array(		
			'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('zyloplus_whychooseus_title',array(
			'label'	=> __('Add title for our services','zyloplus'),
			'section'	=> 'zyloplus_sectionsecond',
			'setting'	=> 'zyloplus_whychooseus_title'
	));		
	$wp_customize->add_setting('zyloplus_pagecolumn1',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'zyloplus_sanitize_dropdown_pages'
	)); 
	$wp_customize->add_control(	'zyloplus_pagecolumn1',array('type' => 'dropdown-pages',			
			'section' => 'zyloplus_sectionsecond',
	));		
	$wp_customize->add_setting('zyloplus_pagecolumn2',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'zyloplus_sanitize_dropdown_pages'
	)); 
	$wp_customize->add_control(	'zyloplus_pagecolumn2',array('type' => 'dropdown-pages',			
			'section' => 'zyloplus_sectionsecond',
	));	
	$wp_customize->add_setting('zyloplus_pagecolumn3',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'zyloplus_sanitize_dropdown_pages'
	)); 
	$wp_customize->add_control(	'zyloplus_pagecolumn3',array('type' => 'dropdown-pages',			
			'section' => 'zyloplus_sectionsecond',
	));	
	$wp_customize->add_setting('zyloplus_pagecolumn4',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'zyloplus_sanitize_dropdown_pages'
	)); 
	$wp_customize->add_control(	'zyloplus_pagecolumn4',array('type' => 'dropdown-pages',			
			'section' => 'zyloplus_sectionsecond',
	));//end four column page boxes	
	 $wp_customize->add_setting('zyloplus_page_excerptlength',array(		
			'sanitize_callback'	=> 'sanitize_text_field',			
	));	
	$wp_customize->add_control('zyloplus_page_excerptlength',array(
			'label'	=> __('Add excerpt length for page boxes in word count','zyloplus'),
			'section'	=> 'zyloplus_sectionsecond',
			'setting'	=> 'zyloplus_page_excerptlength'
	));	
	$wp_customize->add_setting('zyloplus_disabled_pgboxes',array(
			'default' => true,
			'sanitize_callback' => 'zyloplus_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 	
	$wp_customize->add_control( 'zyloplus_disabled_pgboxes', array(
			   'settings' => 'zyloplus_disabled_pgboxes',
			   'section'   => 'zyloplus_sectionsecond',
			   'label'     => __('Uncheck To Enable This Section','zyloplus'),
			   'type'      => 'checkbox'
	 ));//Disable Homepage boxes Section	
	  
	 //Social Icons Section	
	$wp_customize->add_section('zyloplus_socialmedia',array(
			'title'	=> __('Social Icons','zyloplus'),				
			'description'	=> __('Add social icons link here. More icon available in in PRO Version','zyloplus'),				
			'priority'		=> null,
			'panel' => 'zyloplus_panel_id',
	));		
	$wp_customize->add_setting('zyloplus_fb_link',array(			
			'sanitize_callback'	=> 'esc_url_raw'	
	));	
	$wp_customize->add_control('zyloplus_fb_link',array(
			'label'	=> __('Add facebook link here','zyloplus'),
			'section'	=> 'zyloplus_socialmedia',
			'setting'	=> 'zyloplus_fb_link'
	));	
	$wp_customize->add_setting('zyloplus_twitt_link',array(		
			'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('zyloplus_twitt_link',array(
			'label'	=> __('Add twitter link here','zyloplus'),
			'section'	=> 'zyloplus_socialmedia',
			'setting'	=> 'zyloplus_twitt_link'
	));
	$wp_customize->add_setting('zyloplus_gplus_link',array(			
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('zyloplus_gplus_link',array(
			'label'	=> __('Add google plus link here','zyloplus'),
			'section'	=> 'zyloplus_socialmedia',
			'setting'	=> 'zyloplus_gplus_link'
	));
	$wp_customize->add_setting('zyloplus_linked_link',array(			
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('zyloplus_linked_link',array(
			'label'	=> __('Add linkedin link here','zyloplus'),
			'section'	=> 'zyloplus_socialmedia',
			'setting'	=> 'zyloplus_linked_link'
	));		
}
add_action( 'customize_register', 'zyloplus_customize_register' );
//Custom Css
function zyloplus_custom_css(){
		?>
        	<style type="text/css"> 					
					a, 
					#sidebar ul li a:hover,									
					.site-articles h3 a:hover,								
					.boxes-4:hover h3,					
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a, 
					.postmeta a:hover,
					.headertop .left a:hover,
					.social-icons a:hover,
					h2.section-title span
					{ color:<?php echo esc_html( get_theme_mod('zyloplus_color_scheme','#dd3333')); ?>;}					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,					
					.nivo-controlNav a.active,
					.ReadMore:hover,								
					.slide_info .slide_more,				
					h3.widget-title,
					h2.section-title:after,											
					#sidebar .search-form input.search-submit,				
					.wpcf7 input[type='submit']					
					{ background-color:<?php echo esc_html( get_theme_mod('zyloplus_color_scheme','#dd3333')); ?>;}					
					
					aside.widget
					{ border-color:<?php echo esc_html( get_theme_mod('zyloplus_color_scheme','#dd3333')); ?>;}					
			</style> 
<?php          
}         
add_action('wp_head','zyloplus_custom_css');	 
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zyloplus_customize_preview_js() {
	wp_enqueue_script( 'zyloplus_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'zyloplus_customize_preview_js' );