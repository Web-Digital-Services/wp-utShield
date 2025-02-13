<?php 
/** This supports all customizer MODS (With the exception of the theme color switcher and logo uploader)
**/
    function ut_health_register_header_button_settings($wp_customize) {
    // 1. Add a settings for all elements
    $wp_customize->add_setting('featured_link_text');
    $wp_customize->add_setting('featured_link_url');
    $wp_customize->add_setting('featured_link_icon');
    $wp_customize->add_setting('featured_link_text_two');
    $wp_customize->add_setting('featured_link_url_two');
    $wp_customize->add_setting('featured_link_icon_two');
    $wp_customize->add_setting('UTH_add_give_button_setting');
    $wp_customize->add_setting('UTH_contact_phone_number');
    $wp_customize->add_setting('UTH_contact_url');

    //2. We are using a defaut section so we dont No need for step 2 to create a new section. 
    $wp_customize->add_section( 'UTH_header_config' , array(
        'title'       => __('Header','UT-Health'),
        'description' => 'All customization features for the header',
        'priority'    => 20,
    ) );
    //3. Add a control
        //Documentation: https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
    $wp_customize->add_control( 
        'featured_link_text_label',
        array(
        'label' => 'Featured Link Text',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'featured_link_text',
        ) );
    $wp_customize->add_control( 
        'featured_link_url_label',
        array(
        'label' => 'Featured Link URL',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'featured_link_url',
        ) );
    $wp_customize->add_control( 
        'featured_link_icon_label',
        array(
        'label' => 'Featured Icon',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'featured_link_icon',
        ) );
    $wp_customize->add_control( 
        'featured_link_text_two_label',
        array(
        'label' => 'Featured Link Text (2)',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'featured_link_text_two',
        ) );
    $wp_customize->add_control( 
        'featured_link_url_two_label',
        array(
        'label' => 'Featured Link URL (2)',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'featured_link_url_two',
        ) );
    $wp_customize->add_control( 
        'featured_link_icon_two_label',
        array(
        'label' => 'Featured Icon (2)',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'featured_link_icon_two',
        ) );
    $wp_customize->add_control( 
        'UTH_add_give_button_control',
        array(
        'label' => 'Giving Donation Link',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'UTH_add_give_button_setting',
        ) );
    $wp_customize->add_control( 
        'UTH_add_contact_us_number',
        array(
        'label' => 'Contact Phone Number',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'UTH_contact_phone_number',
        ) );
    $wp_customize->add_control( 
        'UTH_add_contact_us_url',
        array(
        'label' => 'Contact Us Page URL',
        'type' => 'text',
        'section' => 'UTH_header_config',
        'settings' => 'UTH_contact_url',
        ) );
}
add_action('customize_register', 'ut_health_register_header_button_settings');

//3. Global Contact Info
function UTH_contact_info_customizer($wp_customize) {
    // add a setting for the site logo
    $wp_customize->add_setting('UTH_global_contact_institution_name');
    $wp_customize->add_setting('UTH_global_contact_center_name');
    $wp_customize->add_setting('UTH_global_contact_address');
    $wp_customize->add_setting('UTH_global_contact_phone');
    $wp_customize->add_setting('UTH_global_contact_fax');
    $wp_customize->add_setting('UTH_global_contact_email');
    $wp_customize->add_setting('UTH_global_contact_link_text');
    $wp_customize->add_setting('UTH_global_contact_link_url');
    $wp_customize->add_setting('UTH_global_contact_design');

    $wp_customize->add_section( 'UTH_global_contact_info' , array(
        'title'       => __('Global Contact Info','UT-Health'),
        'description' => 'Please add your site-wide contact info here. <br> <a class="carat-double" href="https://uthscsa.teamdynamix.com/TDClient/KB/ArticleDet?ID=78484" target="_blank">Learn about this feature</a>',
        'priority'    => 60,
    ) );

    $wp_customize->add_control( 
        'UTH_global_contact_institution_name_control',
        array(
            'label' => 'Institution Name',
            'description' => __( 'This is usually UT Health San Antonio', 'UT-Health' ),
            'type' => 'text',
            'section' => 'UTH_global_contact_info',
            'settings' => 'UTH_global_contact_institution_name',
        ) 
    );
    $wp_customize->add_control( 
        'UTH_global_contact_center_name_control',
        array(
            'label' => 'Program / Center Name',
            'type' => 'text',
            'section' => 'UTH_global_contact_info',
            'settings' => 'UTH_global_contact_center_name',
        ) 
    );
    $wp_customize->add_control( 
        'UTH_global_contact_address_control',
        array(
            'label' => 'Address',
            'type' => 'textarea',
            'section' => 'UTH_global_contact_info',
            'settings' => 'UTH_global_contact_address',
        ) 
    );
    $wp_customize->add_control( 
        'UTH_global_contact_phone_control',
        array(
            'label' => 'Phone',
            'type' => 'text',
            'section' => 'UTH_global_contact_info',
            'settings' => 'UTH_global_contact_phone',
        ) 
    );
    $wp_customize->add_control( 
        'UTH_global_contact_fax_control',
        array(
            'label' => 'Fax',
            'type' => 'text',
            'section' => 'UTH_global_contact_info',
            'settings' => 'UTH_global_contact_fax',
        ) 
    );
    $wp_customize->add_control( 
        'UTH_global_contact_email_control',
        array(
            'label' => 'Email',
            'type' => 'text',
            'section' => 'UTH_global_contact_info',
            'settings' => 'UTH_global_contact_email',
        ) 
    );
    $wp_customize->add_control( 
        'UTH_global_contact_link_text_control',
        array(
            'label' => 'Featured Link Text',
            'type' => 'text',
            'section' => 'UTH_global_contact_info',
            'settings' => 'UTH_global_contact_link_text',
        ) 
    );
    $wp_customize->add_control( 
        'UTH_global_contact_link_url_control',
        array(
            'label' => 'Featured Link URL',
            'type' => 'text',
            'section' => 'UTH_global_contact_info',
            'settings' => 'UTH_global_contact_link_url',
        ) 
    );
    $wp_customize->add_control( 
        'UTH_global_contact_design_control', 
        array(
            'type' => 'checkbox',
            'section' => 'UTH_global_contact_info', // Add a default or your own section
            'settings' => 'UTH_global_contact_design',
            'label' => __( 'Convert to basic panel' ),
            'description' => __( 'If checked, this will load baige panel instead of panel outline' ),
        )
    );
}
add_action('customize_register', 'UTH_contact_info_customizer');
function uth_customizer_related_posts($wp_customize) {
    // 1. Add a settings for all elements
    $wp_customize->add_setting( 'uth_enable_related_posts');
    $wp_customize->add_setting('uth_disable_alamo_footer');
    $wp_customize->add_setting('uth_disable_sidebar');
    $wp_customize->add_setting('uth_alerts_events_title');
    $wp_customize->add_setting('uth_alerts_events_copy');

    //2. Add Section
    $wp_customize->add_section( 'UTH_site_settings' , array(
        'title'       => __('Site Settings (Advanced)','UT-Health'),
        'description' => '',
        'priority'    => 100,
    ) );
    //3. Add a control
        //Documentation: https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
    $wp_customize->add_control( 'uth_enable_related_posts_control', array(
        'type' => 'checkbox',
        'section' => 'UTH_site_settings', // Add a default or your own section
        'settings' => 'uth_enable_related_posts',
        'label' => __( 'Enable Related Posts' ),
        'description' => __( 'If checked, this will load a related posts feed below a blog/news posts' ),
        )
    );
    $wp_customize->add_control( 'uth_disable_alamo_footer_control', array(
        'type' => 'checkbox',
        'section' => 'UTH_site_settings', // Add a default or your own section
        'settings' => 'uth_disable_alamo_footer',
        'label' => __( 'Disable the Alamo on Footer' ),
        'description' => __( 'If unchecked, this will leave the alamo logo display to be set on a page by page level(edit page).' ),
        )
    );
    $wp_customize->add_control( 'uth_disable_sidebar_control', array(
        'type' => 'checkbox',
        'section' => 'UTH_site_settings', // Add a default or your own section
        'settings' => 'uth_disable_sidebar',
        'label' => __( 'Disable Sidebars' ),
        'description' => __( 'If unchecked, posts and other individual pages will not load widget sidebars.' ),
        )
    );
    $wp_customize->add_control( 
        'uth_alerts_events_title_control',
        array(
        'label' => 'Alerts: Title of Alert',
        'type' => 'text',
        'section' => 'UTH_site_settings',
        'settings' => 'uth_alerts_events_title',
        'description' => __( 'Please limit to 30 characters. If more is needed, use this is a short title and the next field as the long message.' ),
        ) );
    $wp_customize->add_control( 
        'uth_alerts_events_copy_control',
        array(
        'label' => 'Alerts: Alert Message (Optional)',
        'type' => 'textarea',
        'section' => 'UTH_site_settings',
        'settings' => 'uth_alerts_events_copy',
        ) );
}
add_action('customize_register', 'uth_customizer_related_posts');
function UTH_customizr_additional_info($wp_customize) {
    // add a setting
    $wp_customize->add_setting('UTH_additional_info');
    
    //Add Section
    $wp_customize->add_section( 'UTH_addl_info' , array(
        'title'       => __('Additional Info','UT-Health'),
        'description' => 'Use this field to display information that will appear at the bottom of ALL posts',
        'priority'    => 200,
    ) );
    $wp_customize->add_control( 
        'UTH_footer_grant_info_control',
            array(
                'label' => 'Additional Info',
                'type' => 'textarea',
                'section' => 'UTH_addl_info',
                'settings' => 'UTH_additional_info',
            ) 
        );
}
add_action('customize_register', 'UTH_customizr_additional_info');