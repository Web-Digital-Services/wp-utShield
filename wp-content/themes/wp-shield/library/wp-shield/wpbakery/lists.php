<?php
/*
Element Description: Example Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_content_lists extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_content_lists_mapping' ), 12 );
        add_shortcode( 'vc_content_lists', array( $this, 'vc_content_lists_html' ) );
    }
    // Element Mapping
    public function vc_content_lists_mapping() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('List Types', 'wp-shield'),
                'base' => 'vc_content_lists',
                'description' => __('Add a lists with various styles', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/images/shield.png',            
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    // Dropwdown Field
                    array(
                        //Wizywig Editor
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'heading' => __( 'Bulleted List Content', 'wp-shield' ),
                        'description' => __('Please select a bulleted list in the controls belows to above the list content', 'wp-shield'), 
                        'param_name' => 'content',
                        'value' => __( '', 'wp-shield' ),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'lists Style',
                        'param_name' => 'uth_lists_styles',
                        'value'      => array(
                            'Line Delimited List'  => 'lines',
                            'Arrow List '  => 'arrow',
                            'Check List'  => 'check',
                            'Inline List'  => 'inline',
                            'Inline Arrow List'  => 'inline arrow'
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
                    ),  
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_content_lists_html( $atts, $content ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'uth_lists_styles'   => '',
                    'optional_css'   => ''
                ), 
                $atts
            )
        );
        /** Additional Logic to render designs **/
        if (empty($uth_lists_styles)){
            $uth_lists_styles = 'lists';
        }

        $content = wpautop($content);
        
        // RENDER THE HTML
        $html = '
            <div class="' . $uth_lists_styles  . ' ' . $optional_css . '" >
                ' . $content . '
            </div>';
        return $html; 
    }
     
} // End Element Class
 
// Element Class Init
new uth_content_lists();    