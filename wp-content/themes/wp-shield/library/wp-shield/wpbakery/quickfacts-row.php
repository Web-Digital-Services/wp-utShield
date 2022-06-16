<?php
/*a
Element Description: Quickfacts Vertical
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_quickfact_row extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vertical_quickfacts_row_mapping' ), 12 );
        add_shortcode( 'vertical_quickfacts_row', array( $this, 'vertical_quickfacts_row_html' ) );
    }
    // Element Mapping

    public function vertical_quickfacts_row_mapping() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                'name' => __('Quickfacts (Row)', 'wp-shield'),
                'base' => 'vertical_quickfacts_row',
                'description' => __('A row of quick facts', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                'params' => array(   
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Callout Title (Required)', 'wp-shield' ),
                        'param_name' => 'callout_title',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
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
                        'heading' => __( 'Number (Fact 2)', 'wp-shield' ),
                        'param_name' => 'num_2',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text (Fact 2)', 'wp-shield' ),
                        'param_name' => 'fact_copy_2',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'class' => 'text-class',
                        'heading' => __( 'Number (Fact 3)', 'wp-shield' ),
                        'param_name' => 'num_3',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text (Fact 3)', 'wp-shield' ),
                        'param_name' => 'fact_copy_3',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'class' => 'text-class',
                        'heading' => __( 'Number (Fact 4)', 'wp-shield' ),
                        'param_name' => 'num_4',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text (Fact 4)', 'wp-shield' ),
                        'param_name' => 'fact_copy_4',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Color Options',
                        'param_name' => 'color_options',
                        'group' => __( 'Design Options', 'wp-shield' ),
                        'value'      => array(
                            'Default (Beige)'  => 'beige',
                            'Blue'  => ' color'
                        )
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Heading Level',
                        'param_name' => 'heading_level',
                        'group' => __( 'Design Options', 'wp-shield' ),
                        'value'      => array(
                            'Select a heading level'  => '',
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
    public function vertical_quickfacts_row_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'callout_title' => '',
                    'num_1' => '',
                    'num_2' => '',
                    'num_3' => '',
                    'num_4' => '',
                    'fact_copy_1' => '',
                    'fact_copy_2' => '',
                    'fact_copy_3' => '',
                    'fact_copy_4' => '',
                    'heading_level' => '',
                    'color_options' => '',
                    'equilizer_id' => ''
                ), 
                $atts
            )
        );
        
        if (empty($callout_title)){
            $callout_title = 'Quickfacts';
        }
        #Load Equilizer To Match Heights
        if (!empty($equilizer_id)){
            $equilizer_id = 'data-equalizer-watch="' . $equilizer_id . '"';
        }else{
            $equilizer_id = '';
        }

        if (empty($heading_level)){
            $heading_level = "h3";
        }
        if (!empty($num_4) && (!empty($fact_copy_4))){
            $cell_size = "large-3";
        }else{
            $cell_size = "large-4";
        }
        //Render Fact 1
        if (!empty($num_1) && (!empty($fact_copy_1))){
            $renderFact_1 = '<div class="cell ' . $cell_size .'">
            <p class="h2 supersize close">' .  $num_1 . '</p>
            <p>' . $fact_copy_1 . '</p>
        </div>';
        }else{
            $renderFact_1 = '';
        }
        //Render Fact 2
        if (!empty($num_2) && (!empty($fact_copy_2))){
            $renderFact_2 = '<div class="cell ' . $cell_size .'">
            <p class="h2 supersize close">' .  $num_2 . '</p>
            <p>' . $fact_copy_2 . '</p>
        </div>';
        }else{
            $renderFact_2 = '';
        }        
        //Render Fact 3
        if (!empty($num_3) && (!empty($fact_copy_3))){
            $renderFact_3 = '<div class="cell ' . $cell_size .'">
            <p class="h2 supersize close">' .  $num_3 . '</p>
            <p>' . $fact_copy_3 . '</p>
        </div>';
        }else{
            $renderFact_3 = '';
        }        
        //Render Fact 4
        if (!empty($num_4) && (!empty($fact_copy_4))){
            $renderFact_4 = '<div class="cell ' . $cell_size .'">
            <p class="h2 supersize close">' .  $num_4 . '</p>
            <p>' . $fact_copy_4 . '</p>
        </div>';
        }else{
            $renderFact_4 = '';
        }
        $html =
            '<div class="text-center" ' . $equilizer_id . '>
                <div class="grid-x factoids">
                    <div class="cell">
                        <' . $heading_level . '>' . $callout_title . '</' . $heading_level . '>
                    </div>
                    ' . $renderFact_1 . '
                    ' . $renderFact_2 . '
                    ' . $renderFact_3 . '
                    ' . $renderFact_4 . '
                </div>
            </div>';
        return $html; 
    }
     
} // End Element Class
 
// Element Class Init
new uth_quickfact_row();    