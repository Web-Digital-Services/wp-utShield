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
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Contact Card', 'wp-shield'),
                'base' => 'vc_contact_card',
                'description' => __('Card to display contact info and image', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    //Image field
                    array(
                        'type' => 'attach_image',
                        'holder' => 'img',
                        'class' => '',
                        'heading' => __( 'Image', 'wp-shield' ),
                        'param_name' => 'img_url',
                        'value' => __( '', 'wp-shield' ),
                        'description' => __( 'Featured image for the card', 'wp-shield' ),
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Name', 'wp-shield' ),
                        'param_name' => 'name',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Title', 'wp-shield' ),
                        'param_name' => 'title',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Phone', 'wp-shield' ),
                        'param_name' => 'phone',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Email', 'wp-shield' ),
                        'param_name' => 'email',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'heading' => __( 'address', 'wp-shield' ),
                        'param_name' => 'address',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ), 
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'CSS Class (Optional)', 'wp-shield' ),
                        'param_name' => 'optional_css',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
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
                    'name'   => '',
                    'title'   => '',
                    'phone'   => '',
                    'email'   => '',
                    'address'   => '',
                    'optional_css'   => ''
                ), 
                $atts
            )
        );

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
if (!empty($address)){
    $address_display = $address;
}else{
    $address_display = '';
}
if (!empty($phone)){
    $phone_display = '<li>
    <a>
        <span class="fa-li">
            <span class="fa-stack">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
            </span>
        </span>
        <span>' . $phone . '</span>
    </a>
</li>';
}else{
    $phone_display = '';
}
if (!empty($email)){
    $email_display = '<li>
    <a>
        <span class="fa-li">
            <span class="fa-stack">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
            </span>
        </span>
        <span>' . $email . '</span>
    </a>
</li>';
}else{
    $email_display = '';
}

        $content = wpautop($content);
        
        // RENDER THE HTML
        if (!empty($img_url)){
            $html = '<div class="cell card">
            <div class="grid-x grid-padding-x grid-padding-y align-middle">
                <div class="cell small-12 medium-4">'
                    . wp_get_attachment_image($img_url, 'width=100%', 'height=auto') .
                '</div>
                <div class="cell small-12 medium-8">
                <address>'
                    . $name_display . $title_display . $address_display . '</address>
                <ul class="fa-ul">' . 
                    $phone_display .
                    $email_display
                    
                . '</ul>
                </div>
            </div>
        </div>';
        }else{
            $html = '<div class="cell card">
            <div class="grid-x grid-padding-x grid-padding-y align-middle">
                <div class="cell small-12 medium-12">
                    <address>'
                    . $name_display . $title_display .
                    $address_display
                . '</address>
                <ul class="fa-ul">' .
                $phone_display .
                $email_display
                . '</ul>
                </div>
            </div>
        </div>';
        }

        return $html; 
    }
     
} // End Element Class
 
// Element Class Init
new uth_contact_card();    