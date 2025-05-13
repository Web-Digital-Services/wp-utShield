<?php
/*
Element Description: Clickable Link Panel
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/

// Element Class 
class uth_button_group extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_buttons_mapping' ), 12 );
        add_shortcode( 'vc_buttons', array( $this, 'vc_buttons_html' ) );
    }
    // Element Mapping
    public function vc_buttons_mapping() {
             
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Buttons', 'wp-shield'),
                'base' => 'vc_buttons',
                'description' => __('Individual or Grouped Buttons', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                'params' => array(   
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'First Button (Required)', 'wp-shield' ),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( 'Place Link Here', 'wp-shield' ),
                        ),
                        //'description' => __( 'Select the URL here', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'Second Button (Optional)', 'wp-shield' ),
                        'param_name' => 'url_two',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( 'Place Link Here', 'wp-shield' ),
                        ),
                        //'description' => __( 'Select the URL here', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Button Styles',
                        'param_name' => 'uth_button_style',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Orange'  => 'color orange',
                            'White'  => 'white',
                            //'Ghost or Sheer'  => 'ghost'                        
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Center Buttons', 'wp-shield' ),
                        'description' => esc_html__( 'Checking this box will center the buttons.', 'wp-shield' ),
                        'param_name' => 'uth_center_buttons',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),                
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_buttons_html( $atts ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'url'   => '',
                    'url_two'   => '',
                    'uth_button_style' => '',
                    'uth_center_buttons' => ''
                ), 

                $atts
            )
        );
        //Seperating the URL Link parameter by its sub traits
        $use_link = false;
        $button_one = vc_build_link($url);
        if ( strlen ( $button_one['url'] ) > 0) {
            $use_link = true;
            $a_ref = $button_one['url'];
            $a_ref = apply_filters( 'vc_btn_a_href', $a_ref);
            $a_title = $button_one['title'];
            $a_title = apply_filters( 'vc_btn_a_title', $a_title);
            $a_target = $button_one['target'];
            $a_rel = $button_one['rel'];
            
            $button_one_html = '<a class="button ' . $uth_button_style . '" href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '">
            ' . $a_title . '
            </a>';
        }
        $button_two = vc_build_link($url_two);
        if ( strlen ( $button_two['url'] ) > 0) {
            $use_link = true;
            $a_ref_two = $button_two['url'];
            $a_ref_two = apply_filters( 'vc_btn_a_href', $a_ref_two);
            $a_title_two = $button_two['title'];
            $a_title_two = apply_filters( 'vc_btn_a_title', $a_title_two);
            $a_target_two = $button_two['target'];
            $a_rel_two = $button_two['rel'];

            $button_two_html = '<a class="button ghost ' . $uth_button_style . '" href="' . $a_ref_two . '" title="' . $a_title_two . '" target="' . $a_target_two . '" rel="' . $a_rel_two . '">
            ' . $a_title_two . '
            </a>';
        }
        if (!empty($button_two_html))
        {
            if ($uth_center_buttons == 'true') {
                $wrapper = '<div class="button-group align-center">';
                $end_wrapper = '</div>';
            }else{
                $wrapper = '<div class="button-group">';
                $end_wrapper = '</div>';
            }
        }else{
            if ($uth_center_buttons == 'true') {
                $wrapper ='<p class="text-center">';
                $button_two_html = '';
                $end_wrapper = '</p>';
            }else{
                $wrapper ='<p>';
                $button_two_html = '';
                $end_wrapper = '</p>';
            }
        }
        // Fill $html var with data
        $html = ' 
            ' . $wrapper . '
                ' . $button_one_html . '
                ' . $button_two_html . '
            ' . $end_wrapper . '
        ';
         
        return $html;
    }
     
} // End Element Class
 
// Element Class Init
new uth_button_group();    