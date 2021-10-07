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
}