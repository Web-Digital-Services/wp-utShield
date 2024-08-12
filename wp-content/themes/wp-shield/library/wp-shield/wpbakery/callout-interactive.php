<?php
/*
Element Description: Clickable Link Panel
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/

// Element Class 
class uth_Panel_link extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_interactive_callouts_mapping' ), 12 );
        add_shortcode( 'vc_interactive_callouts', array( $this, 'vc_interactive_callouts_html' ) );
    }
    // Element Mapping
    public function vc_interactive_callouts_mapping() {
             
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                'name' => __('Callout (Interactive)', 'wp-shield'),
                'base' => 'vc_interactive_callouts',
                'description' => __('An Interactive Callout Panel', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                'params' => array(   
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Color of Panel',
                        'param_name' => 'uth_colors',
                        'group' => 'Panel Content',
                        'value'      => array(
                            'Orange'  => 'color orange',
                            'Blue'  => 'color blue',
                            'Dark Orange'  => 'color darken',
                            'Grey'  => 'color grey',
                            'Special'  => 'special'
                        )
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Panel Title (Required)', 'wp-shield' ),
                        'param_name' => 'text',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Panel Content',
                    ), 
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Smaller Panel Title (Optional)', 'wp-shield' ),
                        'description' => esc_html__( 'Display the title heading in a smaller font size. H3 heading will display as h5 style.', 'wp-shield' ),
                        'param_name' => 'smaller_heading',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Panel Content',
                    ),    
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'One Sentence Description (Optional)', 'wp-shield' ),
                        'param_name' => 'paragraph_text',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Panel Content',
                    ),
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
                        'group' => 'Panel Content',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Equilizer ID', 'wp-shield' ),
                        'param_name' => 'equilizer_id',
                        'description' => esc_html__( 'This feature will can be used to match the heights of elements in the row. ', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Match Heights',	
                    ),
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Enable Icon', 'wp-shield' ),
                        'description' => esc_html__( 'Checking this box will disable the featured image field.', 'wp-shield' ),
                        'param_name' => 'enable_icon',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Icon Options',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Icon library', 'js_composer' ),
                        'value' => array(
                            esc_html__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                            esc_html__( 'Open Iconic', 'js_composer' ) => 'openiconic',
                        ),
                        'admin_label' => true,
                        'group' => 'Icon Options',
                        'param_name' => 'type',
                        'description' => esc_html__( 'Select icon library.', 'js_composer' ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_fontawesome',
                        'value' => 'fa fa-adjust',
                        'group' => 'Icon Options',
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
                        'group' => 'Icon Options',
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
                    )
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_interactive_callouts_html( $atts ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'url'   => '',
                    'text' => '',
                    'smaller_heading'   => '',
                    'paragraph_text' => '',
                    'uth_colors' => '',
                    'enable_icon' => '',
                    'type' => '',
                    'icon_openiconic' => '',
                    'icon_fontawesome' => '',
                    'equilizer_id' => ''
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
            if (strlen ( $href['title'] ) > 0){
                $a_title = ' title="' . $href['title'] . '"';
                $a_title = apply_filters( 'vc_btn_a_title', $a_title);
            }else{
                $a_title = "";
            }
            if (strlen ( $href['target'] ) > 0){
                $a_target = ' target="' . $href['target'] . '"';
            }else{
                $a_target = "";
            }
            if (strlen ( $href['rel'] ) > 0){
                $a_rel = ' rel="' . $href['rel'] . '"';
            }else{
                $a_rel = "";
            }
        }

        //The first drop down option in dropdown params are always empty.. Adding a the enque 
        if (empty($type)){
            $type = 'fontawesome';
        }
        // Enqueue needed icon font. - Pulled from plugin core - JMO Nov5th. 2019
        vc_icon_element_fonts_enqueue( $type );
        //Combining both dropdown options into a single icon to display
        $icon = $icon_openiconic.$icon_fontawesome;
        
        /** Default to the shield icon if none is selected */
        if (empty($icon)){
            $icon = 'fa-users';
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
        //If smaller heading is checked, add h5 class to heading
        if($smaller_heading == 'true'){
            $heading_size = 'h5';
        }else{
            $heading_size = '';
        }

        //If icon is disabled, use RULED Heading class
        if (($enable_icon == 'false' || empty($enable_icon )) && (!empty($paragraph_text))){
            $ruled = 'ruled';
        }else{
            $ruled = '';
        }
        if (!empty($paragraph_text)){
            $paragraph_text = '<p>' . $paragraph_text . '</p>';
        }
        // Fill $html var with data
        $html = ' 
        <a class="callout panel-mobile text-center ' . $uth_colors . '" href="' . $a_ref . '"' . $a_title . $a_target . $a_rel .  $equilizer_id . '>
            ' . $render_icon . '
            <h3 class="' . $heading_size . ' ' . $ruled . '">' . $text . '</h3>
            ' . $paragraph_text . '
        </a>';
         
        return $html;
    }
     
} // End Element Class
 
// Element Class Init
new uth_Panel_link();    