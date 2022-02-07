<?php
/*
Element Description: Custom Subnav Element
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_subnav extends WPBakeryShortCode {
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_subnav_mapping' ), 12 );
        add_shortcode( 'vc_subnav', array( $this, 'vc_subnav_html' ) );
    }
    // Element Mapping

    public function vc_subnav_mapping() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Subnav', 'wp-shield'),
                'base' => 'vc_subnav',
                'description' => __('Optional banner design for child pages', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'dist/assets/images/core/shield.png',            
                'params' => array(   
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'group' => 'Menu Selection',
                        'heading'    => 'Select Menu',
                        'description' => 'In order to use this feature, you need to have the menu created by the webteam through a service request. Once the menu
                        is created, you can assign the menu to each page that is included.',
                        'param_name' => 'uth_menu_id',
                        'value'      => array(
                            'Subnav 1'  => 'subnav_1',
                            'Subnav 2'  => 'subnav_2',
                            'Subnav 3'  => 'subnav_3',
                            'Subnav 4'  => 'subnav_4',
                            'Subnav 5'  => 'subnav_5',
                            'Subnav 6'  => 'subnav_6',
                            'Subnav 7'  => 'subnav_7',
                            'Subnav 8'  => 'subnav_8',
                            'Subnav 9'  => 'subnav_9',
                            'Subnav 10'  => 'subnav_10',
                            'Subnav 11'  => 'subnav_11',
                            'Subnav 12'  => 'subnav_12',
                            'Subnav 13'  => 'subnav_13',
                            'Subnav 14'  => 'subnav_14',
                            'Subnav 15'  => 'subnav_15',
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Disable Callout Title', 'wp-shield' ),
                        'param_name' => 'disable_title',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Heading Level',
                        'param_name' => 'uth_heading_level',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Heading 2'  => 'h2',
                            'Heading 3'  => 'h3',
                            'Heading 4'  => 'h4',
                        )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Menu Title (Override)', 'wp-shield' ),
                        'param_name' => 'menu_title_override',
                        'description' => esc_html__( 'By default, this block will use the menu assigned in the menu system. Use this field to set a local menu title.', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Design Options',
                    ),  
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Callout Design',
                        'param_name' => 'subnav_callout_design',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Callout Outline'  => '',
                            'Callout Basic'  => 'callout',
                            'No Wrapper'  => 'null',
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Enable Icon', 'wp-shield' ),
                        'param_name' => 'enable_icon',
                        'description' => 'The icon cannot be displayed if the title is disabled.',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Icon Settings',
                    ),
                   /* array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Icon Style',
                        'param_name' => 'uth_icon_style',
                        'group' => 'Icon Settings',
                        'value'      => array(
                            'Icon before Title'  => 'h2',
                            'Icon in Circle'  => 'h3',
                        )
                    ), */
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Icon library', 'js_composer' ),
                        'value' => array(
                            esc_html__( 'UT Health', 'js_composer' ) => 'uthscsa-icons',
                            esc_html__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                            esc_html__( 'Open Iconic', 'js_composer' ) => 'openiconic',
                        ),
                        'admin_label' => true,
                        'group' => 'Icon Settings',
                        'param_name' => 'type',
                        'description' => esc_html__( 'Select icon library.', 'js_composer' ),
                    ),
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'js_composer' ),
                        'param_name' => 'icon_fontawesome',
                        'value' => 'fa fa-adjust',
                        'group' => 'Icon Settings',
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
                        'group' => 'Icon Settings',
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
                        'group' => 'Icon Settings',
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
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_subnav_html( $atts ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'uth_menu_id'   => '',
                    'disable_title' => '',
                    'uth_heading_level' => '',
                    'enable_icon' => '',
                    'type' => '',
                    'icon_openiconic' => '',
                    'icon_fontawesome' => '',
                    'icon_uthealth' => '',
                    'subnav_callout_design' => '',
                    'menu_title_override' => '',
                ), 
                $atts
            )
        );
        $icon_render = '';
        if (empty($subnav_callout_design)){
            $subnav_callout_design = 'callout outline';
        }
        if ($enable_icon == true){
            //The first drop down option in dropdown params are always empty.. Adding a the enque 
            if (empty($type)){
                $type = 'uthscsa-icons';
            }
            // Enqueue needed icon font.
            vc_icon_element_fonts_enqueue( $type );
            //Combining all 3 dropdown options into a single icon to display
            $icon = $icon_openiconic.$icon_fontawesome.$icon_uthealth;
            /** Default to the shield icon if none is selected */
            if (empty($icon)){
                $icon = 'icon-uth-shield';
            }
            $icon_render = 'small-icon ' . $icon;
        }else{
            $icon_render =='';
        }
        /** Default Values if none are selected. **/
        if (empty($uth_menu_id)){
            $uth_menu_id = "subnav_1";
        }
        
        //Get the Menu Name
        $menu_name = wp_get_nav_menu_name($uth_menu_id );
        $aria_menu_name = wp_get_nav_menu_name($uth_menu_id );


        if (empty($uth_heading_level)){
            $uth_heading_level = 'h2';
        }
        /** Disable the Title? **/
        if ($disable_title == 'true'){
            $menu_name_render = '';
        }elseif(!empty($menu_title_override)){
            //If custom menu title is filled
            $menu_name_render = '<' . $uth_heading_level . ' class="colorized-heading"><i class="' . $icon_render . '"></i>' . $menu_title_override . '</' . $uth_heading_level . '>';
        }elseif(!empty($menu_title_override) && (!empty($icon_render))){
            //If theres a override title and the icon isnt empty
            $menu_name_render = '<' . $uth_heading_level . ' class="colorized-heading"></i>' . $menu_title_override . '</' . $uth_heading_level . '>';
        }elseif (!empty($icon_render)){
            //If there isn't an override title and the icon isn't empty
            $menu_name_render = '<' . $uth_heading_level . '><i class="' . $icon_render . '"></i>' . $menu_name . '</' . $uth_heading_level . '>';
        }else{
            //Load Menu name from wordpress menu system
            $menu_name_render = '<' . $uth_heading_level . '>' . $menu_name . '</' . $uth_heading_level . '>';
        }


        if ( has_nav_menu( $uth_menu_id ) ) {
            ob_start();
            $menu_render = wp_nav_menu( array(
                'container'      => 'nav', // Remove nav container
                'container_id'   => 'subnav',
                'container_class' => $subnav_callout_design,
                'container_aria_label' => 'Sub navigation for ' . $aria_menu_name,
                'menu'           => $uth_menu_id, //Get the menu name from the shortcode attributes
                'menu_class'     => 'subnav',
                'theme_location' => $uth_menu_id,
                'items_wrap'     => $menu_name_render . '<ul id="%1$s" class="%2$s vertical menu accordion-menu" data-accordion-menu>%3$s</ul>',
                'fallback_cb'    => false,
            )
        );
        return ob_get_clean();

        }else{
            return '<div class="callout alert"><strong>ERROR: </strong>This menu does has not been created in WordPress. Please check the menu selection or create a service ticket for assistance.</div>';
        }
    }
     
} // End Element Class
 
// Element Class Init
new uth_subnav();    