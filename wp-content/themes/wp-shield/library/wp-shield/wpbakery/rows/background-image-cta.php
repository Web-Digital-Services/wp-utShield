<?php
/*
Element Description: VC Info Box
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_Background_Text_link extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_background_text_link_panel_mapping' ), 12 );
        add_shortcode( 'vc_background_text_link_panel', array( $this, 'vc_background_text_link_panel_html' ) );
    }
    // Element Mapping
    public function vc_background_text_link_panel_mapping() {
             
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                'name' => __('Background Image Row (CTA)', 'ut-health'),
                'base' => 'vc_background_text_link_panel',
                'description' => __('Full row call to action', 'ut-health'), 
                'category' => __('UT Health Designs', 'ut-health'),   
                'icon' => get_template_directory_uri().'/assets/images/core/shield.png',            
                'params' => array(   
                    array(
                        'type' => 'attach_image',
                        'holder' => 'div',
                        'heading' => __( 'Background Image', 'ut-health' ),
                        'param_name' => 'image',
                        'value' => __( 'Default value', 'ut-health' ),
                        'description' => esc_html__( 'Recommended size is 1550px by 600px. Needs to be cropped before uploading.', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Panel Settings',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Title', 'ut-health' ),
                        'param_name' => 'title',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Panel Settings',
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Body Text', 'ut-health' ),
                        'param_name' => 'body_text',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Panel Settings',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Button Text', 'ut-health' ),
                        'param_name' => 'button_text',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Panel Settings',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'URL', 'ut-health' ),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( 'Place Link Here', 'ut-health' ),
                        ),
                        'description' => __( 'Select the URL here', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Panel Settings',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Color Options',
                        'param_name' => 'uth_panel_colors',
                        'group' => 'Design Options',
                        'description' => 'Developer Note: Use these CSS classes on the parent row and stretch the row. <br>
                        Purple = bleed colorized colorized-institutional <br>
                        Blue = bleed colorized colorized-patientcare <br>
                        Green = bleed colorized colorized-academics <br>
                        Brown = bleed colorized colorized-research <br>',
                        'value'      => array(
                            'Theme Color'  => '',
                            'Purple'  => 'colorized colorized-institutional',
                            'Blue'  => 'colorized colorized-patientcare',
                            'Green'  => 'colorized colorized-academics',
                            'Brown'  => 'colorized colorized-research',
                            //'Orange'  => 'colorized',
                        )
                    )                   
                         
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_background_text_link_panel_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'url'   => '',
                    'uth_colors' => '',
                    'title' => '',
                    'body_text' => '',
                    'button_text' => '',
                    'image' => 'image',
                    'uth_panel_colors' => '',

                ), 
                $atts
            )
        );
        $image_id = wp_get_attachment_image_src( $image, 'full' );

        $use_link = false;
        $href = vc_build_link($url);
        if ( strlen ( $href['url'] ) > 0) {
            $use_link = true;
            $a_ref = $href['url'];
            $a_ref = apply_filters( 'vc_btn_a_href', $a_ref);
            $a_title = $href['title'];
            $a_title = apply_filters( 'vc_btn_a_title', $a_title);
            $a_target = $href['target'];
            $a_rel = $href['rel'];
            

        }
        if (empty ($uth_panel_colors)){
            $uth_panel_colors = 'colorized colorized-theme';
        }

        // Fill $html var with data
        $html = '
        <div class="bleed photo-bleed ' . $uth_panel_colors . ' cozy close">
            <div class="bg-photo alpha attach-top"><img src="' . $image_id[0] . '"></div>
            <div class="row">
                <div class="columns large-9 large-centered text-center">
                    <div class="panel ' . $uth_panel_colors . '-darken">
                        <div class="panel colorized alpha text-center">
                            <h2 class="emulate-h1">' . $title . '</h2>
                            <p>' . $body_text .'</p>
                            <p><strong><a class="button carat-double" href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '">' . $button_text . '</a></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
         
        return $html;
         
    }
     
} // End Element Class
 
// Element Class Init
new uth_Background_Text_link();    