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
                        'heading' => __( 'URL (Required)', 'wp-shield' ),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( 'Place Link Here', 'wp-shield' ),
                        ),
                        'description' => __( 'Select the URL here', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Button Link',
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
                    'text' => '',
                    'uth_button_style' => ''
                ), 

                $atts
            )
        );
        if (!empty($equilizer_id)){
            $equilizer_id = 'data-equalizer-watch="' . $equilizer_id . '"';
            $css_equilizer = 'equilizer-activated';
        }else{
            $equilizer_id = '';
            $css_equilizer ='no-equilizer';
        }
        //Seperating the URL Link parameter by its sub traits
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
        // Enqueue needed icon font. - Pulled from plugin core - JMO Nov5th. 2019
        vc_icon_element_fonts_enqueue( $type );
        //Combining all 3 dropdown options into a single icon to display
        $icon = $icon_openiconic.$icon_fontawesome.$icon_uthealth;
        
        /** Default to the shield icon if none is selected */
        if (empty($icon)){
            $icon = 'icon-uth-shield';
        }

        /** Check to see if the icons and borders need to be disabled **/
        if ($enable_icon == 'true'){
            $render_icon = '<span class="fa-stack fa-2x">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-' . $icon . ' fa-stack-1x fa-inverse"></i>
            </span>';
        }elseif(!empty($image_id[0])){
            $render_icon = '<div class="text-center"><img src=' . $image_id[0] . '></div>';
        }else{
            $render_icon = '';
        }

        //The first drop down option in dropdown params are always empty. Adding to make sure option 1 is colorized. 
        if(empty($uth_colors)){
        	$uth_colors = 'colorized';
        }
        /** Default to the shield icon if none is selected */
        if (empty($icon)){
            $icon = 'icon-uth-shield';
        }
        //If icon is disabled, use RULED Heading class
        if ($enable_icon == 'false' || empty($enable_icon)){
            $ruled = 'class="ruled"';
        }else{
            $ruled = '';
        }
        // Fill $html var with data
        $html = ' 
        <a class="button ' . $uth_button_style . '" href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '" ' . $equilizer_id . '>
        ' . $a_title . '
        </a>';
         
        return $html;
    }
     
} // End Element Class
 
// Element Class Init
new uth_button_group();    