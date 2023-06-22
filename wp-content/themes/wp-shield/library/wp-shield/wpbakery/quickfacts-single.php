<?php
/*a
Element Description: Quickfacts Vertical
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_quickfact_single extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'single_quickfacts_row_mapping' ), 12 );
        add_shortcode( 'single_quickfacts_row', array( $this, 'single_quickfacts_row_html' ) );
    }
    // Element Mapping

    public function single_quickfacts_row_mapping() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                'name' => __('Quickfacts (Single)', 'wp-shield'),
                'base' => 'single_quickfacts_row',
                'description' => __('A single quick fact', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                'params' => array(   
                    array(
                        'type' => 'textfield',
                        'class' => 'text-class',
                        'heading' => __( 'Number (Fact 1)', 'wp-shield' ),
                        'param_name' => 'num_1',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text (Fact 1)', 'wp-shield' ),
                        'param_name' => 'fact_copy_1',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'class' => 'text-class',
                        'heading' => __( 'Additional classes for heading', 'wp-shield' ),
                        'param_name' => 'class_1',
                        'group' => __( 'Design Options', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Heading Level',
                        'param_name' => 'heading_level',
                        'group' => __( 'Design Options', 'wp-shield' ),
                        'value'      => array(
                            'Select a heading level'  => '',
                            'Paragraph'  => 'p',
                            'Heading 2'  => 'h2',
                            'Heading 3'  => 'h3',
                            'Heading 4'  => 'h4',
                        )
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
    public function single_quickfacts_row_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'num_1' => '',
                    'fact_copy_1' => '',
                    'heading_level' => '',
                    'equilizer_id' => '',
                    'class_1' => ''
                ), 
                $atts
            )
        );
        
        #Load Equilizer To Match Heights
        if (!empty($equilizer_id)){
            $equilizer_id = 'data-equalizer-watch="' . $equilizer_id . '"';
        }else{
            $equilizer_id = '';
        }

        if (empty($heading_level)){
            $heading_level = "h3";
        }
        //Render Fact 1
        if (!empty($num_1) && (!empty($fact_copy_1))){
            $renderFact_1 = '<' . $heading_level . ' class="' . $class_1 . '">' .  $num_1 . '</' . $heading_level .'>
            <p>' . $fact_copy_1 . '</p>';
        }else{
            $renderFact_1 = '';
        }
        
        $html = $renderFact_1;
        return $html; 
    }
     
} // End Element Class
 
// Element Class Init
new uth_quickfact_single();    