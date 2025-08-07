<?php
/*
Element Description: VC Info Box
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_icons extends WPBakeryShortCode { 
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_icons_mapping' ), 12 );
        add_shortcode( 'vc_icons', array( $this, 'vc_icons_html' ) );
    }
    // Element Mapping
    public function vc_icons_mapping() {       
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Icons', 'wp-shield'),
                'base' => 'vc_icons',
                'description' => __('Add Icons to a page', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),
                'icon' => get_template_directory_uri().'/images/shield.png',            
                'params' => array(
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Icon Style',
                        'param_name' => 'enable_circle_icon',
                        'value'      => array(
                            'Default'  => '',
                            'Circle'  => 'true',
                            'Square (social)'  => 'square'
                        ),
                        'weight' => 0,
                    ), 
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Icon library', 'js_composer' ),
                        'value' => array(
                            esc_html__( 'UT Health', 'js_composer' ) => 'uthscsa-icons',
                            esc_html__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                            esc_html__( 'Open Iconic', 'js_composer' ) => 'openiconic',
                        ),
                        'admin_label' => true,
                        'param_name' => 'type',
                        'description' => esc_html__( 'Select icon library.', 'js_composer' ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_fontawesome',
                        'value' => 'fa fa-adjust',
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'type' => 'fontawesome',
                            'iconsPerPage' => 200, // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'fontawesome',
                        ),
                        'description' => __( 'Select icon from library', 'js_composer' ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_openiconic',
                        'value' => 'vc-oi vc-oi-dial',// default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'type' => 'openiconic',
                            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'openiconic',
                        ),
                        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_uthealth',
                        'value' => 'uthscsa',// default value to backend editor admin_label
                        'settings' => array(
                            'emptyIcon' => false, // default true, display an "EMPTY" icon?
                            'type' => 'uthscsa-icons',
                            'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => 'uthscsa-icons',
                        ),
                        'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Icon Sizes',
                        'param_name' => 'uth_icon_size',
                        'value'      => array(
                            'Default Size'  => '',
                            'Extra Small'  => 'fa-xs',
                            'Small'  => 'fa-sm',
                            'Standard'  => 'standard',
                            'Large'  => 'fa-lg',
                            'Size 2'  => 'fa-2x',
                            'Size 3'  => 'fa-3x',
                            'Size 4'  => 'fa-4x',
                            'Size 5'  => 'fa-5x',
                            'Size 6'  => 'fa-6x',
                            'Size 7'  => 'fa-7x',
                            'Size 8'  => 'fa-8x',
                            'Size 9'  => 'fa-9x',
                            'Size 10'  => 'fa-10x'
                        )
                    ),  
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Icon Copy Title (Optional)', 'wp-shield' ),
                        'description' => esc_html__( 'Use this title option when putting the icon above paragraph text and using the icon as a link', 'wp-shield' ),
                        'param_name' => 'icon_title',
                        'group' => __( 'Title Options', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Heading Level',
                        'param_name' => 'heading_level',
                        'group' => __( 'Title Options', 'wp-shield' ),
                        'description' => esc_html__( 'Select Inline for square/social icons.', 'wp-shield' ),
                        'value'      => array(
                            'Select a heading level'  => '',
                            'Inline - no heading'  => 'span',
                            'Heading 2'  => 'h2',
                            'Heading 3'  => 'h3',
                            'Heading 4'  => 'h4',
                        )
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'URL', 'wp-shield' ),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( '', 'wp-shield' ),
                        ),
                        'description' => __( 'Select a URL for the ICON to link to', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    )                         
                )
            )
        );                                
    }
    // Element HTML
    public function vc_icons_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'uth_colors' => '',
                    'type' => '',
                    'icon_openiconic' => '',
                    'icon_fontawesome' => '',
                    'icon_uthealth' => '',
                    'enable_circle_icon' => '',
                    'uth_icon_size' => '',
                    'icon_title' => '',
                    'heading_level' => '',
                    'url'   => '',
                ), 
                $atts
            )
        );
        /** Load Link objects */
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
        //The first drop down option in dropdown params are always empty.. Adding a the enque 
        if (empty($type)){
            $type = 'uthscsa-icons';
        }
        if (empty ($uth_icon_size)){
            $uth_icon_size = 'fa-6x';
        }
        if (empty ($single_icon_color)){
            $single_icon_color = '';
        }
        if (!empty($heading_level) && !empty($icon_title)){
            $render_title = '<' . $heading_level . '>' . $icon_title . '</' . $heading_level . '>';
        }elseif (empty($heading_level) && !empty($icon_title)){
            $heading_level = "h3";
            $render_title = '<h3>' . $icon_title . '</h3>';
        }else{
            $render_title = '';
        }
        if (empty($type)){
            $type = 'fontawesome';
        }
        // Enqueue needed icon font. - Pulled from plugin core - JMO Nov5th. 2019
        vc_icon_element_fonts_enqueue( $type );
        //Combining all 3 dropdown options into a single icon to display
        $icon = $icon_openiconic.$icon_fontawesome.$icon_uthealth;

        /** Default to the shield icon if none is selected */
        if (empty($icon)){
            $icon = 'icon-uth-shield';
        }
        if ((empty($enable_circle_icon)) || ($enable_circle_icon == 'false')){
            $uth_icon_size = $uth_icon_size;
            $stack_class = '';
            if (!empty($a_ref)){
                $opening_wrapper = '<a href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '" class="circle ' . $uth_colors . ' close2x ' . $uth_icon_size . '">';
                $closing_wrapper= $render_title . '</a>';
            }else{
                $opening_wrapper = '';
                $closing_wrapper= $render_title;
            }
        }elseif($enable_circle_icon == 'true'){
            $wrapper_size = $uth_icon_size;
            $uth_icon_size = 'no-size';
            $stack_class = 'fa-stack-1x fa-inverse';
            if (!empty($a_ref)){
                $opening_wrapper = '<a href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '"><span class="fa-stack ' . $wrapper_size . '"><i class="fas fa-circle fa-stack-2x"></i>';
                $closing_wrapper= '</span>' . $render_title . '</a>';
            }else{
                $opening_wrapper = '<span class="fa-stack ' . $wrapper_size . '"><i class="fas fa-circle fa-stack-2x"></i>';
                $closing_wrapper= '</span>';
            }
        }elseif($enable_circle_icon == 'square'){
            $wrapper_size = $uth_icon_size;
            $uth_icon_size = 'no-size';
            $stack_class = 'fa-stack-1x fa-inverse';
            if (!empty($a_ref)){
                $opening_wrapper = '<div class="social"><ul><li><a href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '"><span class="fa-stack ' . $wrapper_size . '"><i class="fas fa-square fa-stack-2x"></i>';
                $closing_wrapper= '</span>' . $render_title . '</a></li></ul></div>';
            }else{
                $opening_wrapper = '<div class="social"><ul><li><span class="fa-stack ' . $wrapper_size . '"><i class="fas fa-square fa-stack-2x"></i>';
                $closing_wrapper= '</span></li></ul></div>';
            }
        }else{
            $single_icon_color = $uth_colors;
            $stack_class = '';
        }
        // RENDER THE HTML
        $html = ' '. $opening_wrapper . '
                <i class="' . $uth_icon_size . ' ' . $single_icon_color . ' ' . $icon . ' ' . $stack_class . '"></i>
                ' . $closing_wrapper . ' ';         
        return $html;
         
    }
     
} // End Element Class
 
// Element Class Init
new uth_icons();    