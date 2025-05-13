<?php
/**
 * Register Theme Design Toggle in Customizer
 * Jared Ozuna
 * @package wp-shield
 * @since wp-shield 1.0.0
 */

 //Creating custom theme colors
 function wp_shield_register_theme_switch ( $wp_customize ) {
	//ADD SETTINGS BELOW
	$wp_customize->add_setting('wp_shield_theme_switch_control', array(
		'theme_design', 
		'default' => 'theme1'
		)
	);
	$wp_customize->add_setting('wp_breadcrumb_theme_switch_control', array(
		'breadcrumb_design', 
		'default' => 'double'
		)
	);	 
	$wp_customize->add_section('wp_shield_theme_selector_section', array(
		'title' => __('Theme Design Options', 'wp-shield'),
		'priority' => 80,
		'description' => __('The follow options will toggle the header and footer design options but should only be changed with Marketing Permission', 'wp-shield')
		)
	);
	$wp_customize->add_control(
	 	'theme_design', 
		array(
			'type' => 'radio',
			'label' => 'Theme Options',
			'section' => 'wp_shield_theme_selector_section',
			'settings' => 'wp_shield_theme_switch_control',
			'choices' => array(
				'standard' => 'Standard Theme',
				'mission' => 'Mission Theme',
				'tenadams' => 'Ten Adams Theme',
			))
		);

	$wp_customize->add_control(
	 	'breadcrumb_design', 
		array(
			'type' => 'radio',
			'label' => 'Breadcrumb Options',
			'section' => 'wp_shield_theme_selector_section',
			'settings' => 'wp_breadcrumb_theme_switch_control',
			'choices' => array(
				'single' => 'Single Carat',
				'double' => 'Double Carat',
			) )
		);

}
add_action ('customize_register', 'wp_shield_register_theme_switch');
function load_theme_design($header_or_footer){
	
	$load_theme_design_selection = get_theme_mod( 'wp_shield_theme_switch_control' );
	$load_breadcrumb_design_selection = get_theme_mod( 'wp_breadcrumb_theme_switch_control');
    
	if (empty($load_theme_design_selection)){
		$load_theme_design_selection = 'standard';
	}
	# Load Logic for loading header or footer
	if ($header_or_footer == 'header'){
		switch ( $load_theme_design_selection ) {
			case 'standard':
				get_header();
			break;
			case 'mission':
				get_header('mission');
			break;
			case 'tenadams':
				get_header('tenadams');
			break;
		}
	}elseif($header_or_footer == 'footer'){
		switch ( $load_theme_design_selection ) {
			case 'standard':
				get_footer();
			break;
			case 'mission':
				get_footer('mission');
			break;
			case 'tenadams':
				get_footer('tenadams');
			break;
		}
	}else{
		echo 'Error: Please select a header or footer in this template files';
	}
}
// Add specific CSS class by filter.
add_filter( 'body_class', function( $classes ) {
	$theme_design_selection = get_theme_mod( 'wp_shield_theme_switch_control' );
    
    switch ( $theme_design_selection ) {
        case 'standard':
			//Load Theme Purple (Institutional));
			array_push($classes, "theme-standard");
        break;
        case 'mission':
			//Load Theme Blue (Acade)
			array_push($classes, "theme-mission");
        break;
        case 'tenadams':
		//Load Theme Green (Reserch)
			array_push($classes, "theme-tenadams");
        break;
		default: 
			array_push($classes, "theme-standard");
        break;
	}
	
    return $classes;	
	} 
);
