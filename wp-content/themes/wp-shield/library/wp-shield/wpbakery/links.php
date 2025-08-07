<?php
/*
Element Description: Link Element
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/

// Element Class 
class uth_link_group extends WPBakeryShortCode {

    // Element Init
    function __construct()
    {
        add_action('init', array($this, 'vc_links_mapping'), 12);
        add_shortcode('vc_links', array($this, 'vc_links_html'));
    }

    // Element Mapping
    public function vc_links_mapping() {

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }

        // Map the block with vc_map()
        vc_map( 
      
            array(
                //Define the name and description 
                'name' => __('Links', 'wp-shield'),
                'base' => 'vc_links',
                'description' => __('Individual link', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/images/shield.png',                      
                'params' => array(
                    array(
                        'type' => 'vc_link',
                        'heading' => __('Link', 'wp-shield'),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'dropdown',
                        'holder' => '',
                        'heading' => __('Class for link', 'wp-shield'),
                        'param_name' => 'link_class',
                        'group' => 'Design Options',
                        'value' => array(
                            'Default' => '',
                            'Non-Bold' => 'coward',
                            'No Underline' => 'no-underline',
                            'Arrow' => 'a',
                            'Highlighted' => 'highlight',
                            'External' => 'external',
                            'File' => 'file'
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __('Center Link', 'wp-shield'),
                        'description' => esc_html__('Checking this box will center the link.', 'wp-shield'),
                        'param_name' => 'uth_center_link',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options'
                    )
                )
            )
        );

    }

    // Element HTML
    public function vc_links_html( $atts, $content ) {

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'url' => '',
                    'uth_center_link' => '',
                    'link_class' => ''
                ),
                $atts
            )
        );

        // link styling
        // assigning arrow class this way since there is a weird bug that moves the dropdown with value 'arrow'
        $link_style = '';

        if ($link_class == 'a' || $link_class == '') {
            $link_style = $link_class == 'a' ? 'arrow' : '';
        } else {
            $link_style = $link_class;
        }
        

        $link_html = '';
        $use_link = false;
        $link = vc_build_link($url);
        if (strlen($link['url']) > 0) {
            $use_link = true;
            $a_ref = $link['url'];
            $a_ref = apply_filters('vc_btn_a_href', $a_ref);
            $a_title = $link['title'];
            $a_title = apply_filters('vc_btn_a_title', $a_title);
            $a_target = $link['target'];
            $a_rel = $link['rel'];

            $link_html = '<a class="' . $link_style . '" href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '">
            ' . $a_title . '
            </a>';
        }

        if ($uth_center_link == 'true') {
            $wrapper = '<p class="text-center">';
            $end_wrapper = '</p>';
        } else {
            $wrapper = '<p>';
            $end_wrapper = '</p>';
        }

        // RENDER THE HTML
        $html = ' 
            ' . $wrapper . '
                ' . $link_html . '
            ' . $end_wrapper . '
        ';

        return $html;
    }

}

new uth_link_group();