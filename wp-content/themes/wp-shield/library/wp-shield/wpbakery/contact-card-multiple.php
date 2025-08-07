<?php
/*
Element Description: Contact card block for multiple contacts. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/

// Element Class 
class uth_contact_card_multiple extends WPBakeryShortCode {

    // Element Init
    function __construct()
    {
        add_action('init', array($this, 'vc_contact_card_multiple_mapping'), 12);
        add_shortcode('vc_contact_card_multiple', array($this, 'vc_contact_card_multiple_html'));
    }

    // Element Mapping
    public function vc_contact_card_multiple_mapping() {

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }

        //Map the block with vc_map()
        vc_map(

            array(
                'name' => __('Contact Card (Multiple)', 'wp-shield'),
                'base' => 'vc_contact_card_multiple',
                'description' => __('Card to display multiple contacts info', 'wp-shield'),
                'category' => __('UT Health Designs', 'wp-shield'),
                'icon' => get_template_directory_uri().'/images/shield.png',
                'params' => array(
                    // Lets have design options first, since we only want one header for all contacts
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Header', 'wp-shield'),
                        'param_name' => 'header',
                        'description' => esc_html__('Headers will be an h3 by default.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => 'Header Size',
                        'param_name' => 'header_size',
                        'description' => esc_html__('h2 will be the largest header size, h5 is the smallest.', 'wp-shield'),
                        'group' => 'Design Options',
                        'value' => array(
                            'Select a header size' => 'h3',
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                        )
                    ),
                    //Not quite working yet
                    /*
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __('Center Content', 'wp-shield'),
                        'description' => esc_html__('Checking this box will center the content.', 'wp-shield'),
                        'param_name' => 'center_element',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),
                    */
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('CSS Class (Optional)', 'wp-shield'),
                        'param_name' => 'optional_css',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),
                    // Contact #1
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Name', 'wp-shield'),
                        'param_name' => 'name1',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Title', 'wp-shield'),
                        'param_name' => 'title1',
                        'description' => esc_html__('Title field in italics.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Secondary Title', 'wp-shield'),
                        'param_name' => 'non_italics_title1',
                        'description' => esc_html__('Title field in regular font.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Phone', 'wp-shield'),
                        'param_name' => 'phone1',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Email', 'wp-shield'),
                        'param_name' => 'email1',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #1',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Fax', 'wp-shield'),
                        'param_name' => 'fax1',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #1',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'heading' => __('address', 'wp-shield'),
                        'param_name' => 'address1',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #1',
                    ),
                    // Contact #2
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Name', 'wp-shield'),
                        'param_name' => 'name2',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Title', 'wp-shield'),
                        'param_name' => 'title2',
                        'description' => esc_html__('Title field in italics.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Secondary Title', 'wp-shield'),
                        'param_name' => 'non_italics_title2',
                        'description' => esc_html__('Title field in regular font.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Phone', 'wp-shield'),
                        'param_name' => 'phone2',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Email', 'wp-shield'),
                        'param_name' => 'email2',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #2',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Fax', 'wp-shield'),
                        'param_name' => 'fax2',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #2',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'heading' => __('address', 'wp-shield'),
                        'param_name' => 'address2',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #2',
                    ),
                    // Contact #3
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Name', 'wp-shield'),
                        'param_name' => 'name3',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Title', 'wp-shield'),
                        'param_name' => 'title3',
                        'description' => esc_html__('Title field in italics.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Secondary Title', 'wp-shield'),
                        'param_name' => 'non_italics_title3',
                        'description' => esc_html__('Title field in regular font.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Phone', 'wp-shield'),
                        'param_name' => 'phone3',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Email', 'wp-shield'),
                        'param_name' => 'email3',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #3',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __('Fax', 'wp-shield'),
                        'param_name' => 'fax3',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #3',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'heading' => __('address', 'wp-shield'),
                        'param_name' => 'address3',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Contact #3',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __('Equilizer ID', 'wp-shield'),
                        'param_name' => 'equilizer_id',
                        'description' => esc_html__('This feature will can be used to match the heights of elements in the row. ', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'group' => 'Match Heights',
                    )
                )
            )
        );

    }

    // Element HTML
    public function vc_contact_card_multiple_html( $atts, $content ) {

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'header' => '',
                    'header_size' => '',
                    //not working quite yet
                    // 'center_element' => '',
                    'optional_css' => '',
                    'equilizer_id' => '',
                    'name1' => '',
                    'title1' => '',
                    'non_italics_title1' => '',
                    'phone1' => '',
                    'email1' => '',
                    'fax1' => '',
                    'address1' => '',
                    'name2' => '',
                    'title2' => '',
                    'non_italics_title2' => '',
                    'phone2' => '',
                    'email2' => '',
                    'fax2' => '',
                    'address2' => '',
                    'name3' => '',
                    'title3' => '',
                    'non_italics_title3' => '',
                    'phone3' => '',
                    'email3' => '',
                    'fax3' => '',
                    'address3' => '',
                ),
                $atts
            )
        );

        $classes = '';
        if (!empty($optional_css)) {
            $classes = ' class="' . esc_attr($optional_css) . '"';
        }

        // Check if we have a header, if we do then choose the size
        $header_display = '';
        if (!empty($header)) {
            switch ($header_size) {
                case 'h2':
                    $header_display = '<h2' . $classes . '>' . esc_html($header) . '</h2><br>';
                    break;
                case 'h3':
                    $header_display = '<h3' . $classes . '>' . esc_html($header) . '</h3><br>';
                    break;
                case 'h4':
                    $header_display = '<h4' . $classes . '>' . esc_html($header) . '</h4><br>';
                    break;
                case 'h5':
                    $header_display = '<h5' . $classes . '>' . esc_html($header) . '</h5><br>';
                    break;
                default:
                    $header_display = '<h3' . $classes . '>' . esc_html($header) . '</h3><br>';
                    break;
            }
        }

        // Center content with checkbox
        /* Not working quite yet
        if ($center_element == 'true') {
            $wrapper = '<div class="grid-x grid-padding-x grid-padding-y text-center" style="margin: 0 auto;">';
            $contact_item_styles = 'display: flex; margin-left: 1rem;';
            $contact_text_styles = 'display: inline-block;';
            $end_wrapper = '</div>';
        } else {
            $wrapper = '<div class="grid-x grid-padding-x grid-padding-y align-middle">';
            $contact_item_styles = '';
            $contact_text_styles = '';
            $end_wrapper = '</div>';
        }
        */

        $wrapper = '<div class="grid-x grid-padding-x grid-padding-y align-middle">';
        $end_wrapper = '</div>';

        /* 
        This is to override the absolute positioning font-awesome uses for icons, 
        only applied if center checkbox is checked or true
        */
        // $unset_style = $center_element == true ? 'style="position: unset;"' : '';

        // Logic for contact sections 1-3
        $name_display1 = (!empty($name1)) ? '<strong>' . $name1 . '</strong><br>' : '';
        $name_display2 = (!empty($name2)) ? '<strong>' . $name2 . '</strong><br>' : '';
        $name_display3 = (!empty($name3)) ? '<strong>' . $name3 . '</strong><br>' : '';

        $title_display1 = (!empty($title1)) ? '<em>' . $title1 . '</em><br>' : '';
        $title_display2 = (!empty($title2)) ? '<em>' . $title2 . '</em><br>' : '';
        $title_display3 = (!empty($title3)) ? '<em>' . $title3 . '</em><br>' : '';

        $non_italics_title_display1 = (!empty($non_italics_title1)) ? $non_italics_title1 . '<br>' : '';
        $non_italics_title_display2 = (!empty($non_italics_title2)) ? $non_italics_title2 . '<br>' : '';
        $non_italics_title_display3 = (!empty($non_italics_title3)) ? $non_italics_title3 . '<br>' : '';

        $address_display1 = (!empty($address1)) ? $address1 : '';
        $address_display2 = (!empty($address2)) ? $address2 : '';
        $address_display3 = (!empty($address3)) ? $address3 : '';

        //phone sections
        if (!empty($phone1)) {
            $phone_display1 =
                '<li>
                    <a>
                        <span class="fa-li" ' . $unset_style . '>
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $phone1 . '</span>
                    </a>
                </li>';
        } else {
            $phone_display1 = '';
        }

        if (!empty($phone2)) {
            $phone_display2 =
                '<li>
                    <a>
                        <span class="fa-li">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $phone2 . '</span>
                    </a>
                </li>';
        } else {
            $phone_display2 = '';
        }
        if (!empty($phone3)) {
            $phone_display3 =
                '<li>
                    <a>
                        <span class="fa-li">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $phone3 . '</span>
                    </a>
                </li>';
        } else {
            $phone_display3 = '';
        }

        //email sections
        if (!empty($email1)) {
            $email_display1 =
                '<li>
                    <a>
                        <span class="fa-li">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $email1 . '</span>
                    </a>
                </li>';
        } else {
            $email_display1 = '';
        }
        
        if (!empty($email2)) {
            $email_display2 =
                '<li>
                    <a>
                        <span class="fa-li">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $email2 . '</span>
                    </a>
                </li>';
        } else {
            $email_display2 = '';
        }

        if (!empty($email3)) {
            $email_display3 =
                '<li>
                    <a>
                        <span class="fa-li">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $email3 . '</span>
                    </a>
                </li>';
        } else {
            $email_display3 = '';
        }

        //fax sections
        if (!empty($fax1)) {
            $fax_display1 =
                '<li>
                    <a>
                        <span class="fa-li">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-fax fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $fax1 . '</span>
                    </a>
                </li>';
        } else {
            $fax_display1 = '';
        }

        if (!empty($fax2)) {
            $fax_display2 =
                '<li>
                    <a>
                        <span class="fa-li">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-fax fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $fax2 . '</span>
                    </a>
                </li>';
        } else {
            $fax_display2 = '';
        }

        if (!empty($fax3)) {
            $fax_display3 =
                '<li>
                    <a>
                        <span class="fa-li">
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-fax fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span>' . $fax3 . '</span>
                    </a>
                </li>';
        } else {
            $fax_display3 = '';
        }

        // Load Equilizer To Match Heights
        if (!empty($equilizer_id)){
            $equilizer_id = 'data-equalizer-watch="' . $equilizer_id . '"';
        }else{
            $equilizer_id = '';
        }

        $content = wpautop($content);
        
        // RENDER THE HTML
        // Check if we have any info in contact 1, 2, or 3. If there is, append that section to the overall contact block
        // Leaving images out for now, makes it a little too complicated
        $html = '<div class="cell card"' . $equilizer_id . '>' . $wrapper;

        // Contact 1 Section (Check if at least one field is filled)
        if (!empty($name_display1) || !empty($title_display1) || !empty($phone_display1) || !empty($email_display1) || !empty($fax_display1)) {
            $html .= '
                <div class="cell small-12 medium-8">'
                    . $header_display .
                    '<address>' . 
                        $name_display1 . 
                        $title_display1 . 
                        $non_italics_title_display1 . 
                        $address_display1 . 
                    '</address>
                    <ul class="fa-ul" style="text-align: left;">' . 
                        $phone_display1 . 
                        $email_display1 . 
                        $fax_display1 . 
                    '</ul>
                </div>';
        }

        // Contact 2 Section
        if (!empty($name_display2) || !empty($title_display2) || !empty($phone_display2) || !empty($email_display2) || !empty($fax_display2)) {
            $html .= '
                <div class="cell small-12 medium-8">
                    <address>' . 
                        $name_display2 . 
                        $title_display2 . 
                        $non_italics_title_display2 . 
                        $address_display2 . 
                    '</address>
                    <ul class="fa-ul" style="text-align: left;">' . 
                        $phone_display2 . 
                        $email_display2 . 
                        $fax_display2 . 
                    '</ul>
                </div>';
        }

        // Contact 3 Section
        if (!empty($name_display3) || !empty($title_display3) || !empty($phone_display3) || !empty($email_display3) || !empty($fax_display3)) {
            $html .= '
                <div class="cell small-12 medium-8">
                    <address>' . 
                        $name_display3 . 
                        $title_display3 . 
                        $non_italics_title_display3 . 
                        $address_display3 . 
                    '</address>
                    <ul class="fa-ul" style="text-align: left;">' . 
                        $phone_display3 . 
                        $email_display3 . 
                        $fax_display3 . 
                    '</ul>
                </div>';
        }

        // Close the overall card and wrapper
        $html .= $end_wrapper . '</div>';

        // Return the final HTML
        return $html; 
    }

} // End Element Class

// Element Class Init
new uth_contact_card_multiple();  
