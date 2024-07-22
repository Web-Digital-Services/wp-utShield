<?php
/*
Element Description: Clickable Link Panel
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/

// Element Class 
class uth_heading extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_heading_mapping' ), 12 );
        add_shortcode( 'vc_heading', array( $this, 'vc_heading_html' ) );
    }
    // Element Mapping
    public function vc_heading_mapping() {
             
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Heading', 'wp-shield'),
                'base' => 'vc_heading',
                'description' => __('Heading - Heading with optional eyebrow', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                'params' => array(  
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __( 'Heading Text', 'ut-health' ),
                        'param_name' => 'uth_heading_text',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __( 'Additional Classes', 'ut-health' ),
                        'param_name' => 'uth_addl_classes',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __( 'Eyebrow Text (Optional)', 'ut-health' ),
                        'param_name' => 'uth_eyebrow_text',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __( 'Optional URL', 'ut-health' ),
                        'param_name' => 'uth_opt_url',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Heading size',
                        'param_name' => 'uth_heading_size',
                        'group' => 'Design Options',
                        'value'      => array(
                            'H2'  => 'h2',
                            'H3'  => 'h3',
                            'H4'  => 'h4',
                            'H5' => 'h5'                     
                        )
                    ), 
                            
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_heading_html( $atts ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'uth_heading_size'   => '',
                    'uth_heading_text'   => '',
                    'uth_addl_classes' => '',
                    'uth_eyebrow_text' => '',
                    'uth_opt_url' => ''
                ), 

                $atts
            )
        );
        if(!empty($uth_addl_classes)){
            $classes = ' class="' . $uth_addl_classes . '"';
        }else{
            $classes = "";
        }
        if(!empty($uth_eyebrow_text)){
            $eyebrow = '<p class="eyebrow">' . $uth_eyebrow_text . '</p>';
        }else{
            $eyebrow = "";
        }
        if (!empty($uth_heading_size)){
            if (!empty($uth_opt_url)){
                $html = $eyebrow . '<a href="' . $uth_opt_url . '"><' . $uth_heading_size . $classes . '>' . $uth_heading_text . '</' . $uth_heading_size . '></a>';     
            }else{
                $html = $eyebrow . '<' . $uth_heading_size . $classes . '>' . $uth_heading_text . '</' . $uth_heading_size . '>';
            }
        }else{
            if (!empty($uth_opt_url)){
                $html = $eyebrow . '<a href="' . $uth_opt_url . '"><h2' . $classes . '>' . $uth_heading_text . '</h2></a>';     
            }else{
                $html = $eyebrow . '<h2' . $classes . '>' . $uth_heading_text . '</h2>';
                } 
            }
         
        return $html;
    }
     
} // End Element Class
 
// Element Class Init
new uth_heading();    