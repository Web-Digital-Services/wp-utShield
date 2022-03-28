<?php 
//Logo Upload Support
function uth_Logo_customizer( $wp_customize ) {
	$wp_customize->add_setting( 'uth_logo_desktop' );
    $wp_customize->add_setting( 'uth_logo_mobile' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'uth_logo_desktop', array(
        'label'    => __( 'Desktop Logo (Full Color)', 'wp-shield' ),
        'section'  => 'title_tagline',
        'priority' => 0,
        //'description' => 'For custom logos, you will need a black version for desktop.',
        'settings' => 'uth_logo_desktop', ) ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'uth_logo_mobile', array(
        'label'    => __( 'Mobile Logo (Full White)', 'wp-shield' ),
        'section'  => 'title_tagline',
        'priority' => 0,
        //'description' => 'For custom logos, you will need a white version for mobile.',
        'settings' => 'uth_logo_mobile', ) ) 
    );
}
add_action( 'customize_register', 'uth_Logo_customizer' );
 
 // Fallback image / Logo Call

function ut_display_logo($media = 'desktop'){
    //If you dont have a mobile image uploaded, then the fallback images will automatically be used.
    if(empty(esc_url( get_theme_mod( 'uth_logo_mobile')))){    
        if ($media == 'desktop'){
            echo  get_template_directory_uri() . '/dist/assets/images/UTHSA_logo_H_Full-Color.png';
        }else{
            echo  get_template_directory_uri() . '/dist/assets/images/UTHSA_logo_H_Full-White.png';
        }
    }else{
        if($media == "desktop"){
            echo esc_url( get_theme_mod( 'uth_logo_desktop' ) );
            //echo $media;
        }else{
            echo esc_url( get_theme_mod( 'uth_logo_mobile' ) );
        }
    }
}