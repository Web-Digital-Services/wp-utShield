<?php 
//Logo Upload Support
function FoundationPress_Logo_customizer( $wp_customize ) {
	$wp_customize->add_setting( 'FoundationPress_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'FoundationPress' ),
    'section'  => 'title_tagline',
    'priority' => 0,
    'settings' => 'FoundationPress_logo', ) ) );

}
add_action( 'customize_register', 'FoundationPress_Logo_customizer' );
 
 // Fallback image / Logo Call

function ut_display_logo(){
    if(empty(esc_url( get_theme_mod( 'FoundationPress_logo'))))
    {
        echo  get_template_directory_uri() . '/assets/images/core/logo.png';
    }else{
        echo esc_url( get_theme_mod( 'FoundationPress_logo' ) );
    }
}