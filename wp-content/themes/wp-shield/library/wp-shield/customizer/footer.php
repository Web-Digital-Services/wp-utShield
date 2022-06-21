<?php 
/** 
 * This supports all footer content in customizer
**/
add_action('customize_register', 'uth_create_footer_settings');
function uth_create_footer_settings($wp_customize) {
    // 1. Add a settings for all elements
    $wp_customize->add_setting('uth_footer_phone');
    $wp_customize->add_setting('uth_footer_address');
    $wp_customize->add_setting('uth_footer_email');
    $wp_customize->add_setting('uth_footer_map');

    //2. Add Section
    $wp_customize->add_section( 'uth_footer' , array(
        'title'       => __('Footer','wp-shield'),
        'description' => 'This information will populate the footer.',
        'priority'    => 20,
        ) 
    );

    //3. Add a control
    //Documentation: https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
    $wp_customize->add_control( 
        'uth_footer_phone_control',
        array(
        'label' => 'Website Phone Number',
        'type' => 'text',
        'section' => 'uth_footer',
        'settings' => 'uth_footer_phone',
        ) 
    );
    $wp_customize->add_control( 
        'uth_footer_email_control',
        array(
        'label' => 'Contact Email',
        'type' => 'text',
        'section' => 'uth_footer',
        'settings' => 'uth_footer_email',
        ) 
    );
    $wp_customize->add_control( 
        'uth_footer_address_control',
        array(
        'label' => 'Location Address',
        'type' => 'textarea',
        'section' => 'uth_footer',
        'settings' => 'uth_footer_address',
        ) 
    );
    $wp_customize->add_control( 
        'uth_footer_map_control',
        array(
        'label' => 'Map Link',
        'type' => 'text',
        'description' => 'Must be formatted as follows: https://www.uthscsa.edu/university/campus-maps',
        'section' => 'uth_footer',
        'settings' => 'uth_footer_map',
        ) 
    );
}
// 2. Social Media Links
function UTH_social_links_customizer($wp_customize) {
    // add a setting for the site logo
    $wp_customize->add_setting('UTH_social_facebook');
    $wp_customize->add_setting('UTH_social_twitter');
    $wp_customize->add_setting('UTH_social_instagram');
    $wp_customize->add_setting('UTH_social_youtube');
    $wp_customize->add_setting('UTH_social_linkedin');

    // Add a control to upload the logo
    $wp_customize->add_control( 
        'UTH_social_facebook_control',
        array(
        'label' => 'Facebook URL',
        'type' => 'text',
        'section' => 'uth_footer',
        'settings' => 'UTH_social_facebook',
        ) );
    $wp_customize->add_control( 
        'UTH_social_twitter_control',
        array(
        'label' => 'Twitter URL',
        'type' => 'text',
        'section' => 'uth_footer',
        'settings' => 'UTH_social_twitter',
        ) );
    $wp_customize->add_control( 
        'UTH_social_instagram_control',
        array(
        'label' => 'Instagram URL',
        'type' => 'text',
        'section' => 'uth_footer',
        'settings' => 'UTH_social_instagram',
        ) );
    $wp_customize->add_control( 
        'UTH_social_youtube_control',
        array(
        'label' => 'YouTube URL',
        'type' => 'text',
        'section' => 'uth_footer',
        'settings' => 'UTH_social_youtube',
        ) );
        $wp_customize->add_control( 
            'UTH_social_linkedin_control',
            array(
            'label' => 'Linked In URL',
            'type' => 'text',
            'section' => 'uth_footer',
            'settings' => 'UTH_social_linkedin',
        ) );
}
add_action('customize_register', 'UTH_social_links_customizer');