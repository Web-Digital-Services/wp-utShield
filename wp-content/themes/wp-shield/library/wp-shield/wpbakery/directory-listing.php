<?php
/*
Element Description: Example Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_directory_listing extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_directory_listing_mapping' ), 12 );
        add_shortcode( 'vc_directory_listing', array( $this, 'vc_directory_listing_html' ) );
    }
    // Element Mapping

    public function vc_directory_listing_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Directory item', 'wp-shield'),
                'base' => 'vc_directory_listing',
                'description' => __('A directory listing of photo, name, title, phone/email, and bio', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/images/shield.png',            
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    array(
                        //Checkbox
                        'type' => 'checkbox',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Display Vertically', 'wp-shield' ),
                        'param_name' => 'vertical_display',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 1,
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Name', 'wp-shield' ),
                        'param_name' => 'directory_name',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 2,
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
                        'weight' => 4,
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
                        'weight' => 5,
                    ),
                    array(
                        //Wizywig Editor
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Bio', 'wp-shield' ),
                        'param_name' => 'content',
                        'value' => __( '', 'wp-shield' ),
                        'description' => __( 'Bio', 'wp-shield' ),
                        //'admin_label' => false,
                        'weight' => 6,
                    ),    
                    array(
                        'type' => 'attach_image',
                        'holder' => 'img',
                        'class' => '',
                        'heading' => __( 'Image', 'wp-shield' ),
                        'param_name' => 'image_url',
                        'value' => __( '', 'wp-shield' ),
                        'description' => __( 'Image', 'wp-shield' ),
                        'weight' => 7,
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Optional Link', 'wp-shield' ),
                        'param_name' => 'directory_link',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 8,
                    ),                  
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_directory_listing_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'image_url'   => 'image_url',
                    'directory_name'  => '',
                    'bio' => $content,
                    'phone' => '',
                    'email' => '',
                    'vertical_display' => '',
                    'directory_link' => '',
                ), 
                $atts
            )
        );
        if($vertical_display == 'true'){
            if (!empty($directory_name)){
                $directory_name = '<h3 class="h4 margin-top">' . $directory_name . '</h3>';
            }else{
                $directory_name = '';
            }
            if (!empty($directory_link)){
                $directory_name = '<a href="'. $directory_link . '"><h3 class="h4 margin-top">' . $directory_name . '</h3></a>';
            }
            if (!empty($bio)){
                $bio = '<p>' . $bio . '</p>';
            }else{
                $bio = '';
            }
            if (!empty($email)){
                $email = '
                <li>
                    <a href="mailto:' . $email . '">
                        <span class="fa-li">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                        </span>
                        <span>' . $email . '</span>
                    </a>
                </li>';
                }else{
                $email = '';
            }
            if (!empty($phone)){
                $phone = '
                <li>
                     <a href="tel:' . $phone . '">
                             <span class="fa-li">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                             </span>
                         <span class="">' . $phone . '</span>
                     </a>
                 </li>';
             }else{
                 $phone = '';
             }
            $html = wp_get_attachment_image($image_url, 'full', 'alt') . '<br>' . $directory_name . '<ul class="fa-ul">' . $email . $phone . '</ul><br>' . $bio;

        }else{
        if (!empty($image_url)){
            $image_display = '<div class="cell small-12 medium-4 large-4">'
             . wp_get_attachment_image($image_url, 'full', 'alt') . '</div>';
        }else{
            $image_display = '';
        }
        $bio = $content;
        if (!empty($directory_name)){
            $directory_name = '<h2 class="h3">' . $directory_name . '</h2>';
        }else{
            $directory_name = '';
        }
        if (!empty($directory_title)){
            $directory_title = '<p class="subheader">' . $directory_title . '</p>';
        }else{
            $directory_title = '';
        }
        if (!empty($bio)){
            $bio = '<p>' . $bio . '</p>';
        }else{
            $bio = '';
        }
        if (!empty($phone)){
           $phone = '
           <li>
                <a href="tel:' . $phone . '">
                        <span class="fa-li">
                           <i class="fas fa-circle fa-stack-2x"></i>
                           <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
                        </span>
                    <span class="">' . $phone . '</span>
                </a>
            </li>';
        }else{
            $phone = '';
        }
        if (!empty($email)){
            $email = '
            <li>
                <a href="mailto:' . $email . '">
                    <span class="fa-li">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>' . $email . '</span>
                </a>
            </li>';
            }else{
            $email = '';
        }
        // RENDER THE HTML
        $html = '
            <div class="grid-x grid-margin-x margin-top">
                ' . $image_display . '
            <div class="cell small-12 medium-8 large-8">
                ' . $directory_name . '
                ' . $directory_title . '
            <div class="grid-x grid-margin-x"><div class="cell medium-12 large-12"><address><div class="loose-list"><ul class="fa-ul">
            ' . $email . '
              ' . $phone . '
            </ul></div></address></div></div>
            ' . $bio . '
            </div></div>';
    }
        return $html;
         
    }
     
} // End Element Class
 
// Element Class Init
new uth_directory_listing();    