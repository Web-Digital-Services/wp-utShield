<?php
/*
Element Description: Example Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_content_Callout extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_content_callout_mapping' ), 12 );
        add_shortcode( 'vc_content_callout', array( $this, 'vc_content_callout_html' ) );
    }
    // Element Mapping

    public function vc_content_callout_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Callout (Content)', 'wp-shield'),
                'base' => 'vc_content_callout',
                'description' => __('Add a callout for content (non clickable)', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    // Dropwdown Field
                    array(
                        //Wizywig Editor
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'heading' => __( 'Callout Content', 'wp-shield' ),
                        'param_name' => 'content',
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Content',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Callout Style',
                        'param_name' => 'uth_callout_styles',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Static'  => 'callout roomy',
                            'Outline'  => 'callout outline',
                            'Nested'  => 'callout nested',
                            'Sidecar'  => 'sidecar',
                        )
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Color Options',
                        'description' => esc_html__( 'Color options will apply to borders or enabled icon circles.', 'wp-shield' ),
                        'param_name' => 'color_class',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Default'  => 'light',
                            'Medium Beige (Static Callouts)'  => 'beige',
                            'Dark Beige (Static Callouts)'  => 'dark-beige',
                            'Light Grey (Static Callouts)'  => 'light-grey',
                            'White (Static Callouts)'  => 'white',
                            'Blue (Outline or Nested)'  => 'blue',
                            'Orange (Nested)'  => 'orange',
                        )
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
    public function vc_content_callout_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'uth_callout_styles'   => '',
                    'optional_css'   => '',
                    'color_class' => '',
                    'Callout_border' => '',
                    'equilizer_id' => ''
                ), 
                $atts
            )
        );
        if (!empty($equilizer_id)){
            $equilizer_id = 'data-equalizer-watch="' . $equilizer_id . '"';
        }else{
            $equilizer_id = '';
        }
        /** Additional Logic to render designs **/
        if (empty($uth_callout_styles)){
            $uth_callout_styles = 'callout';
    }

        //Combine the border with the color options if needed
        if(!empty($Callout_border)){
            $Callout_border = $Callout_border . ' ' . $border_color;
        }
        $content = wpautop($content);
        
        // RENDER THE HTML
        if ($uth_callout_styles == 'sidecar'){
            $html = '
                <div class="Callout colorized ' . $background_color  . '" >
                    <div class="row">
                        <div class="columns large-2 medium-2 small-2">
                            <span class="mid-icon"><i class="mega-icon  ' . $icon . ' "></i></span>
                        </div>
                        <div class="columns large-10 medium-10 small-10">
                            ' . $content . '
                        </div>
                    </div>
                </div>';
        }else{
            $html = '
            <div class="' . $uth_callout_styles . ' ' . $color_class . ' ' . $optional_css . '" ' . $equilizer_id . '>
                <p>' . do_shortcode($content) . '</p>
            </div>';
        }

        return $html; 
    }
     
} // End Element Class
 
// Element Class Init
new uth_content_Callout();    