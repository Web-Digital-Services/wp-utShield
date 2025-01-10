<?php
/*
Element Description: Example Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_contact_card extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_contact_card_mapping' ), 12 );
        add_shortcode( 'vc_contact_card', array( $this, 'vc_contact_card_html' ) );
    }
    // Element Mapping

    public function vc_contact_card_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                'name' => __('Contact Card', 'wp-shield'),
                'base' => 'vc_contact_card',
                'description' => __('Card to display contact info and image', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',         
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'holder' => 'img',
                        'class' => '',
                        'heading' => __( 'Image', 'wp-shield' ),
                        'param_name' => 'img_url',
                        'value' => __( '', 'wp-shield' ),
                        'description' => __( 'Featured image for the card', 'wp-shield' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Header', 'wp-shield' ),
                        'param_name' => 'header',
                        'description' => esc_html__('Headers will be an h3 by default.', 'wp-shield'),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Name', 'wp-shield' ),
                        'param_name' => 'name',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Title', 'wp-shield' ),
                        'param_name' => 'title',
                        'description' => esc_html__('Title field in italics.', 'wp-shield'),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Secondary Title', 'wp-shield' ),
                        'param_name' => 'non_italics_title',
                        'description' => esc_html__('Title field in regular font.', 'wp-shield'),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Phone', 'wp-shield' ),
                        'param_name' => 'phone',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Email', 'wp-shield' ),
                        'param_name' => 'email',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Fax', 'wp-shield' ),
                        'param_name' => 'fax',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'heading' => __( 'address', 'wp-shield' ),
                        'param_name' => 'address',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
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
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'CSS Class (Optional)', 'wp-shield' ),
                        'param_name' => 'optional_css',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Equilizer ID', 'wp-shield' ),
                        'param_name' => 'equilizer_id',
                        'description' => esc_html__( 'This feature will can be used to match the heights of elements in the row. ', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Match Heights', 
                    )
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_contact_card_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'img_url'   => '',
                    'header'   => '',
                    'name'   => '',
                    'title' => '',
                    'non_italics_title' => '',
                    'phone'   => '',
                    'email'   => '',
                    'fax'     => '',
                    'address'   => '',
                    'header_size' => '',
                    'center_element' => '',
                    'optional_css'   => '',
                    'equilizer_id' => ''
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

        if (!empty($name)){
            $name_display = '<strong>' . $name . '</strong><br>';
        }else{
            $name_display = '';
        }

        if (!empty($title)){
            $title_display = '<em>' . $title . '</em><br>';
        }else{
            $title_display = '';
        }

        if (!empty($non_italics_title)){
            $non_italics_title_display = $non_italics_title . '<br>';
        }else{
            $non_italics_title_display = '';
        }
        
        if (!empty($address)){
            $address_display = $address;
        }else{
            $address_display = '';
        }

        // Center content with checkbox
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

        /* 
        This is to override the absolute positioning font-awesome uses for icons, 
        only applied if center checkbox is checked or true
        */
        $unset_style = $center_element == true ? 'style="position: unset;"' : '';


        if (!empty($phone)){
            $phone_display = 
                '<li ' . $contact_item_styles . '>
                    <a href="tel:' . $phone . '">
                        <span class="fa-li" ' . $unset_style . '>
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span ' . $contact_text_styles . '>' . $phone . '</span>
                    </a>
                </li>';
        } else {
            $phone_display = '';
        }

        if (!empty($email)){
            $email_display =
                '<li ' . $contact_item_styles . '>
                    <a href="mailto:' . $email . '">
                        <span class="fa-li" ' . $unset_style . '>
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span ' . $contact_text_styles . '>' . $email . '</span>
                    </a>
                </li>';
        } else {
            $email_display = '';
        }

        //third field added, fax
        if (!empty($fax)){
            $fax_display =
                '<li ' . $contact_item_styles . '>
                    <a>
                        <span class="fa-li" ' . $unset_style . '>
                            <span class="fa-stack">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-fax fa-stack-1x fa-inverse"></i>
                            </span>
                        </span>
                        <span ' . $contact_text_styles . '>' . $fax . '</span>
                    </a>
                </li>';
        } else {
            $fax_display = '';
        }

        #Load Equilizer To Match Heights
        if (!empty($equilizer_id)){
            $equilizer_id = 'data-equalizer-watch="' . $equilizer_id . '"';
        }else{
            $equilizer_id = '';
        }

        $content = wpautop($content);
        
        // RENDER THE HTML
        if (!empty($img_url)){
            $html = '
                <div class="cell card"' . $equilizer_id . '>
                    ' . $wrapper . '
                        <div class="cell small-12 medium-4">'
                            . wp_get_attachment_image($img_url, 'width=100%', 'height=auto') .
                        '</div>
                        <div class="cell small-12 medium-8">' 
                                . $header_display .
                            '<address>' . 
                                $name_display . 
                                $title_display . 
                                $non_italics_title_display . 
                                $address_display . 
                            '</address>
                            <ul class="fa-ul" style="text-align: left;">' . 
                                $phone_display .
                                $email_display . 
                                $fax_display . 
                            '</ul>
                        </div>
                    ' . $end_wrapper . '
                </div>';
        } else {
            $html = '
                <div class="cell card"' . $equilizer_id . '>
                    ' . $wrapper . '
                        <div class="cell small-12 medium-12">'
                                . $header_display .
                            '<address>' . 
                                $name_display . 
                                $title_display . 
                                $non_italics_title_display . 
                                $address_display . 
                            '</address>
                            <ul class="fa-ul" style="text-align: left;">' .
                                $phone_display .
                                $email_display . 
                                $fax_display . 
                            '</ul>
                        </div>
                    ' . $end_wrapper . '
                </div>';
        }

        return $html; 
    }
     
} // End Element Class
 
// Element Class Init
new uth_contact_card();    