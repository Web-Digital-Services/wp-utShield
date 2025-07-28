<?php
/*
Element Description: Example Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_content_Sidecar_Callout extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_content_sidecar_callout_mapping' ), 12 );
        add_shortcode( 'vc_content_sidecar_callout', array( $this, 'vc_content_sidecar_callout_html' ) );
    }
    // Element Mapping

    public function vc_content_sidecar_callout_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Sidecar Callout', 'wp-shield'),
                'base' => 'vc_content_sidecar_callout',
                'description' => __('Add a callout with two content sections to appear side by side. Only use this block if you have content that needs to appear side by side.', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/images/shield.png',            
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Left Header', 'wp-shield' ),
                        'param_name' => 'header_left',
                        'description' => esc_html__( 'The heading on the left side of the callout', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        //Text Editor
                        'type' => 'textarea',
                        'holder' => 'div',
                        'heading' => __( 'Left Content', 'wp-shield' ),
                        'param_name' => 'left_content',
                        'description' => esc_html__( 'This should only be used for text. No pictures or testmonials in these.', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Left Button Text', 'wp-shield' ),
                        'param_name' => 'button_text_left',
                        'description' => esc_html__( 'Button Text', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Left Button Link', 'wp-shield' ),
                        'param_name' => 'button_left_link',
                        'description' => esc_html__( 'Button Link', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Second Left Button Text', 'wp-shield' ),
                        'param_name' => 'second_button_text_left',
                        'description' => esc_html__( 'Second Button Text', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Second Left Button Link', 'wp-shield' ),
                        'param_name' => 'second_button_left_link',
                        'description' => esc_html__( 'Second Button Link', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Right Header', 'wp-shield' ),
                        'param_name' => 'header_right',
                        'description' => esc_html__( 'The heading on the right side of the callout', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        //Text Editor
                        'type' => 'textarea',
                        'holder' => 'div',
                        'heading' => __( 'Right Content', 'wp-shield' ),
                        'param_name' => 'right_content',
                        'description' => esc_html__( 'Content on the right needs to be an extension of the content on the left.', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Right Button Text', 'wp-shield' ),
                        'param_name' => 'button_text_right',
                        'description' => esc_html__( 'Button Text', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Right Button Link', 'wp-shield' ),
                        'param_name' => 'button_right_link',
                        'description' => esc_html__( 'Button Link', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Second Right Button Text', 'wp-shield' ),
                        'param_name' => 'second_button_text_right',
                        'description' => esc_html__( 'Second Button Text', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Second Right Button Link', 'wp-shield' ),
                        'param_name' => 'second_button_right_link',
                        'description' => esc_html__( 'Second Button Link', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',	
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Color Options',
                        'description' => esc_html__( 'Color options will apply to borders or enabled icon circles.', 'wp-shield' ),
                        'param_name' => 'color_class',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Default (Dark Grey)'  => 'sidecar',
                            'Light Beige'  => 'sidecar light-beige',
                            'Grey'  => 'sidecar grey',
                        )
                    ), 
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Equilizer ID', 'wp-shield' ),
                        'param_name' => 'equilizer_id',
                        'description' => esc_html__( 'This feature will can be used to match the heights of elements in the row. ', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Match Heights',	
                    ),
                )
                )
                );                               
            
    }
    // Element HTML
    public function vc_content_sidecar_callout_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'header_left'   => '',
                    'left_content'   => '',
                    'button_text_left' => '',
                    'button_left_link' => '',
                    'second_button_text_left' => '',
                    'second_button_left_link' => '',
                    'header_right' => '',
                    'right_content' => '',
                    'button_text_right' => '',
                    'button_right_link' => '',
                    'second_button_text_right' => '',
                    'second_button_right_link' => '',
                    'color_class'   => '',
                    'equilizer_id'   => '',
                ), 
                $atts
            )
        );
        if (!empty($equilizer_id)){
            $equilizer_id = 'data-equalizer-watch="' . $equilizer_id . '"';
        }else{
            $equilizer_id = '';
        }
        
        if (empty($color_class)) {
            $color_class = 'sidecar';
        }

        if (!empty($header_left)){
            $header_left = '<h5>' . $header_left . '</h5>';
        }else{
            $header_left = '';
        }

        if ((!empty($button_left_link)) && (!empty($button_text_left))){
            $button_left = '<p><a class="button" href="' . $button_left_link . '">' . $button_text_left . '</a></p>';
        }else{
            $button_left = '';
        }

        if ((!empty($second_button_left_link)) && (!empty($second_button_text_left))){
            $second_button_left = '<p><a class="button ghost" href="' . $second_button_left_link . '">' . $second_button_text_left . '</a></p>';
        }else{
            $second_button_left = '';
        }
        //This is for the left side. If both buttons have content they will be placed in a button group. Otherwise, only the first one will be displayed.
        if ((!empty($button_left)) && (!empty($second_button_left))){
            $left_buttons = '<div class=button-group>' . $button_left . $second_button_left . '</div>';
          }else{
            $left_buttons = $button_left;
        }
        
        if ((!empty($button_right_link)) && (!empty($button_text_right))){
            $button_right = '<p><a class="button" href="' . $button_right_link . '">' . $button_text_right . '</a></p>';
        }else{
            $button_right = '';
        }
        
        if ((!empty($second_button_right_link)) && (!empty($second_button_text_right))){
            $second_button_right = '<p><a class="button ghost" href="' . $second_button_right_link . '">' . $second_button_text_right . '</a></p>';
        }else{
            $second_button_right = '';
        }
         //Do the same thing for the right side. If both buttons have content they will be placed in a button group. Otherwise, only the first one will be displayed.
         if ((!empty($button_right)) && (!empty($second_button_right))){
            $right_buttons = '<div class=button-group>' . $button_right . $second_button_right . '</div>';
          }else{
            $right_buttons = $button_right;
        }

        if (!empty($header_right)){
            $header_right = '<h5>' . $header_right . '</h5>';
        }else{
            $header_right = '';
        }
        
            $html = '
         <div class="grid-x margin-bottom ' . $color_class . '">
            <div class="cell medium-12 large-6 flex-container">
               <div class="callout outline flex-child-auto">'
               . $header_left .
                  '<p>' . $left_content . '</p>'
                  . $left_buttons .
               '</div>
            </div>
            <div class="cell medium-12 large-6 flex-container">
               <div class="callout flex-child-auto">'
                  . $header_right . 
                  '<p>' . $right_content . '</p>'
                  . $right_buttons .
               '</div>
            </div>
         </div>';

        return $html; 
    }
}
     
 
// Element Class Init
new uth_content_Sidecar_Callout();    