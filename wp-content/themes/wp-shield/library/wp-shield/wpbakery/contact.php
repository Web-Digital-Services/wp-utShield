<?php
/*
Element Description: Example Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_contact_us extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_contact_us_mapping' ), 12 );
        add_shortcode( 'vc_contact_us', array( $this, 'vc_contact_us_html' ) );
    }
    // Element Mapping

    public function vc_contact_us_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Contact Us', 'wp-shield'),
                'base' => 'vc_contact_us',
                'description' => __('A contact block with phone/email fields', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    //Check box   
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Load Sitewide Contact', 'wp-shield' ),
                        'param_name' => 'load_global',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Callout Content',
                        'description' => 'Checking this box means you want to load the contact info for the department on multiple pages. This information is stored in customizer and may require assistance from Digital Experience.'
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Institution Name', 'wp-shield' ),
                        'param_name' => 'callout_title',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Callout Content',
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'stream_context_get_default()',
                        'class' => 'text-class',
                        'heading' => __( 'Program / Center Name', 'wp-shield' ),
                        'param_name' => 'program_center',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Callout Content',
                    ),
                    array(
                        //Wizywig Editor
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Address', 'wp-shield' ),
                        'param_name' => 'content',
                        'value' => __( '', 'wp-shield' ),
                        'description' => __( 'Paragraph text', 'wp-shield' ),
                        //'admin_label' => false,
                        //'weight' => 0,
                        'group' => 'Callout Content',
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'text-class',
                        'heading' => __( 'Phone Number', 'wp-shield' ),
                        'param_name' => 'phone',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Callout Content',
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'text-class',
                        'heading' => __( 'Fax Number', 'wp-shield' ),
                        'param_name' => 'fax',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Callout Content',
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'text-class',
                        'heading' => __( 'Email', 'wp-shield' ),
                        'param_name' => 'email',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Callout Content',
                    ),    
                    array(
                    //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'text-class',
                        'heading' => __( 'Facebook Handle', 'wp-shield' ),
                        'param_name' => 'facebook_contact',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Callout Content',
                    ),   
                    array(
                    //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'text-class',
                        'heading' => __( 'Twitter Handle', 'wp-shield' ),
                        'param_name' => 'twitter_contact',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Callout Content',
                    ),                   
                )
            )
        );                                     
    }
    // Element HTML
    public function vc_contact_us_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'callout_title'   => '',
                    'program_center' => '',
                    'address' => '',
                    'phone' => '',
                    'fax' => '',
                    'email' => '',
                    'facebook_contact' => '',
                    'twitter_contact' => '',
                    'load_global' => '',

                ), 
                $atts
            )
        );
        $address = $content;
        if ($load_global == 'true'){
            $callout_title = get_theme_mod( 'UTH_global_contact_institution_name');
            $program_center = get_theme_mod( 'UTH_global_contact_center_name');
            $address = get_theme_mod( 'UTH_global_contact_address');
            $phone = get_theme_mod( 'UTH_global_contact_phone');
            $fax = get_theme_mod( 'UTH_global_contact_fax');
            $email = get_theme_mod( 'UTH_global_contact_email');
        }
        if (!empty($callout_title)){
            $callout_title = '<p class="close">' . $callout_title . '</p>';
        }else{
            $callout_title = '';
        }
        if (!empty($program_center)){
            $program_center = '<p class="close">' . $program_center . '</p>';
        }else{
            $program_center = '';
        }
        if (!empty($address)){
            $render_address = '<address>' . $address . '</address>';
        }else{
            $render_address = '<address>' . $content . '</address>';
        }
        if (!empty($phone)){
           $phone = '
           <li>
                <a href="tel:' . $phone . '">
                    <span class="fa-li">
                        <span class="fa-stack">
                           <i class="fas fa-circle fa-stack-2x"></i>
                           <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                        </span>
                    </span>
                    <span class="">' . $phone . '</span>
                </a>
            </li>';
        }else{
            $phone = '';
        }
        if (!empty($fax)){
            $fax = '
            <li>
                <span class="fa-li">
                    <span class="fa-stack">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-fax fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
                <span class="">' . $fax . '</span>
            </li>';
        }else{
            $fax = '';
        }
        if (!empty($email)){
            $email = '
            <li>
                <a href="mailto:' . $email . '">
                    <span class="fa-li">
                        <span class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                        </span>
                    </span>
                    <span class="">' . $email . '</span>
                </a>
            </li>';
            }else{
            $email = '';
        }
        if (!empty($facebook_contact)){
            $facebook_contact = '
            <li>
                <a>
                    <span class="fa-li">
                        <span class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span>
                    </span>
                    <span class=""><a href="https://facebook.com/' . $facebook_contact . '">' . $facebook_contact . '</a></span>
                </a>
            </li>';
            }else{
            $facebook_contact = '';
        }
        if (!empty($twitter_contact)){
            $twitter_contact = '
            <li>
                <a>
                    <span class="fa-li">
                        <span class="fa-stack">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </span>
                    <span class=""><a href="https://twitter.com/' . $twitter_contact . '">@' . $twitter_contact . '</a></span>
                </a>
            </li>';
            }else{
            $twitter_contact = '';
        }
        // RENDER THE HTML
        $html = '
            <div class="callout contact outline">
                <h2 class="h5">Contact Us</h2>
                ' . $callout_title . '
                ' . $program_center . '
                ' . $render_address . '
            <ul class="fa-ul">
              ' . $email . '
              ' . $phone . '
              ' . $fax . '
              ' . $facebook_contact . '
              ' . $twitter_contact . '
            </ul>
            </div>';
         
        return $html;
         
    }
     
} // End Element Class
 
// Element Class Init
new uth_contact_us();    