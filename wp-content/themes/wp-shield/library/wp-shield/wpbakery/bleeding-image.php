<?php
/*
Element Description: VC Info Box
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_bleeding_image extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_bleeding_image_mapping' ), 12 );
        add_shortcode( 'vc_bleeding_image', array( $this, 'vc_bleeding_image_html' ) );
    }
    // Element Mapping
    public function vc_bleeding_image_mapping() {
             
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                'name' => __('Bleeding Image (Row)', 'wp-shield'),
                'base' => 'vc_bleeding_image',
                'description' => __('This design splits the image in half of the row', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                'params' => array(   
                    array(
                        'type' => 'attach_image',
                        'holder' => 'div',
                        'heading' => __( 'Background Image', 'wp-shield' ),
                        'param_name' => 'image',
                        'value' => __( 'Default value', 'wp-shield' ),
                        'description' => esc_html__( 'Recommended size is 1550px by 600px. Needs to be cropped before uploading.', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
                    ),array(
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'class' => 'title-class',
                        'heading' => __( 'Panel Content', 'wp-shield' ),
                        'param_name' => 'content',
                        'value' => __( '', 'wp-shield' ),
                        //'description' => __( 'Paragraph text', 'wp-shield' ),
                        //'admin_label' => false,
                        //'weight' => 0,
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'URL', 'wp-shield' ),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( 'Place Link Here', 'wp-shield' ),
                        ),
                        'description' => __( 'Select the URL here', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Design Options',
                        'param_name' => 'row_design_options',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Bleeding Image Left'  => 'img_bleed_left',
                            'Bleeding Image Right'  => 'img_bleed_right',
                            'Bleeding Image Jump Left'  => 'img_bleed_jump_left',
                            'Bleeding Image Jump Right'  => 'img_bleed_jump_right'
                        )
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Color Options',
                        'param_name' => 'row_color_options',
                        'group' => 'Design Options',
                        'description' => __( 'Color classes need to be applied to the parent row as well. <a href="https://web-digital-services.github.io/Design-System/?p=viewall-components-bleeds" target=_blank>View Documentation</a>', 'wp-shield' ),
                        'value'      => array(
                            'White'  => 'bleed',
                            'Light Beige'  => 'bleed light-beige',
                            'Beige'  => 'bleed beige',
                            'Dark Beige'  => 'bleed dark-beige',
                            'Light Grey'  => 'bleed light-grey',
                            'Blue'  => 'bleed color',
                            'Orange'  => 'bleed color orange',
                            'Grey'  => 'bleed color grey',
                            'Dark Grey'  => 'bleed color dark-grey'
                        )
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Additional CSS Classes (Panel)', 'wp-shield' ),
                        'param_name' => 'extra_panel_class',
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
    public function vc_bleeding_image_html( $atts, $content  ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'row_design_options' => '',
                    'image' => 'image',
                    'row_color_options' => '',
                    'extra_panel_class' => '',
                ), 
                $atts
            )
        );
        $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
        $block_image = wp_get_attachment_image( $image, 'full' );

        if (empty($row_color_options)){
            $row_color_options = "bleed";
            //$view_Order = 'small-order-1 large-order-2';
        }
        // Establish color options default
        if(empty($row_design_options)){
            $row_design_options = 'img_bleed_left';
        }

        if(($row_design_options == 'img_bleed_right') || ($row_design_options == 'img_bleed_left')){
            $margins = 'grid-margin-x';
        }else{
            $margins = 'no-margin';
        }
        /** Establish Design Option Dropdowns */
        if ($row_design_options == 'img_bleed_right' || $row_design_options == 'img_bleed_jump_right' ){
            //Panel Left, Image Right
            $outer_content_wrapper = 'img-bleed-right';
            if ($row_design_options == 'img_bleed_jump_right'){ 
                $wrapper_open = '<div class="callout jump-right">';
                $wrapper_close = '</div>';

            }else{
                $wrapper_open = '';
                $wrapper_close = '';
            }
            $column_left = '
                <div class="cell medium-6 large-6">
                    ' . $wrapper_open . '
                    ' . $content . '
                    ' . $wrapper_close . '
                </div>';
            $column_right = '<div class="cell medium-6 large-6">' . $block_image . '</div>';
        }elseif($row_design_options == 'img_bleed_left' || $row_design_options == 'img_bleed_jump_left' ){
            //Image Left, Panel Right
            $outer_content_wrapper = 'img-bleed-left';
            if ($row_design_options == 'img_bleed_left'){ 
                $view_Order_left = 'small-order-2 large-order-1';
                $view_Order_right = 'small-order-1 large-order-2';
                $wrapper_open = '';
                $wrapper_close = '';
            }else{
                $view_Order_left = '';
                $view_Order_right = '';
                $wrapper_open = '<div class="callout jump-left">';
                $wrapper_close = '</div>';
            }
            $column_left = '<div class="cell large-6 medium-6 ' . $view_Order_left . '">' . $block_image . '</div>';
            $column_right = '<div class="cell large-6 medium-6 ' . $view_Order_right . '">' . $wrapper_open . '' . $content . '' . $wrapper_close . '</div>';
        }else{
            echo 'error';
        }
        // Fill $html var with data
        $html = '
        <section class="' . $row_color_options . '">
            <div class="grid-container ' . $outer_content_wrapper . '">
                <div class="grid-x align-middle ' . $margins  . '">
                    ' . $column_left .'
                    ' . $column_right . '
                </div>
            </div>
        </section>';
         
        return $html;
         
    }
     
} // End Element Class
 
// Element Class Init
new uth_bleeding_image();    