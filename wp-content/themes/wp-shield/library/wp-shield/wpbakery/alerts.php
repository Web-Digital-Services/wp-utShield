<?php
/*
Element Description: Example Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_alert_banner extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_alert_banner_mapping' ), 12 );
        add_shortcode( 'vc_alert_banner', array( $this, 'vc_alert_banner_html' ) );
    }
    // Element Mapping

    public function vc_alert_banner_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Alert Banner', 'wp-shield'),
                'base' => 'vc_alert_banner',
                'description' => __('Banner for critical page alerts', 'wp-shield'), 
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
                        'heading'    => 'Alert Options',
                        'description' => esc_html__( 'Color options will apply to borders or enabled icon circles.', 'wp-shield' ),
                        'param_name' => 'alert_style',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Page Alert (Blue)'  => '',
                            'Page Alert (Grey)'  => ' grey',
                            'Site Wide Alerts (Yellow)'  => ' sitewide',
                            'Closable'  => 'closable'
                        )
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Sticky Options',
                        'description' => esc_html__( 'Do you want this alert to stick to the top or bottom of this window?.', 'wp-shield' ),
                        'param_name' => 'sticky',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Not sticky (Default, placed in WP Bakery)'  => '',
                            'Stick to top'  => 'top',
                            'Stick to bottom'  => 'bottom',
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
                    )
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_alert_banner_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'optional_css'   => '',
                    'alert_style' => '',
                    'sticky' => ''
                ), 
                $atts
            )
        );


        $content = wpautop($content);
        
        // RENDER THE HTML

        if($alert_style == 'closable'){
            if($sticky == 'top' || $sticky == 'bottom') {
                $html = '<div class="callout alert" data-closable data-sticky data-stick-to="' . $sticky . '">
                    <button class="close-button" aria-label="Close alert" type="button" data-close>
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <p>' . do_shortcode($content) . '</p>
                    </div>';

            }else{
                $html = '<div class="callout alert" data-closable>
                    <button class="close-button" aria-label="Close alert" type="button" data-close>
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <p>' . do_shortcode($content) . '</p>
                    </div>';
            }
        }else{
            $html = '<section class="alert' . $alert_style . '">
                <p>' . do_shortcode($content) . '</p><p> sticky is: ' . $sticky . '</p>
            </section>';
        }
        return $html; 
    }
     
} // End Element Class
 
// Element Class Init
new uth_alert_banner();    