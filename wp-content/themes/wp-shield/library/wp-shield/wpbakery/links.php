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
                'description' => __('Individual or Grouped Links', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',                      
                'params' => array(
                    array(
                        'type' => 'vc_link',
                        'heading' => __('First Link (Required)', 'wp-shield'),
                        'param_name' => 'url_one',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    /* Need to debug this some more
                    array(
                        'type' => 'vc_link',
                        'heading' => __('Second Link (Link)', 'wp-shield'),
                        'param_name' => 'url_two',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    */
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
                        'heading' => __('Center Links', 'wp-shield'),
                        'description' => esc_html__('Checking this box will center the links.', 'wp-shield'),
                        'param_name' => 'uth_center_links',
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
                    'url_one' => '',
                    // 'url_two' => '',
                    'uth_center_links' => '',
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
        

        $use_link = false;
        $link_one = vc_build_link($url_one);
        if (strlen($link_one['url']) > 0) {
            $use_link = true;
            $a_ref = $link_one['url'];
            $a_ref = apply_filters('vc_btn_a_href', $a_ref);
            $a_title = $link_one['title'];
            $a_title = apply_filters('vc_btn_a_title', $a_title);
            $a_target = $link_one['target'];
            $a_rel = $link_one['rel'];

            $link_one_html = '<a class="' . $link_style . '" href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '">
            ' . $a_title . '
            </a>';
        }

        $link_two = vc_build_link($url_two);
        if (strlen($link_two['url']) > 0) {
            $use_link = true;
            $a_ref_two = $link_two['url'];
            $a_ref_two = apply_filters('vc_btn_a_href', $a_ref_two);
            $a_title_two = $link_two['title'];
            $a_title_two = apply_filters('vc_btn_a_title', $a_title_two);
            $a_target_two = $link_two['target'];
            $a_rel_two = $link_two['rel'];

            $link_two_html = '<a class="' . $link_style . '" href="' . $a_ref_two . '" title="' . $a_title_two . '" target="' . $a_target_two . '" rel="' . $a_rel_two . '">
            ' . $a_title_two . '
            </a>';
        }
        if (!empty($link_two_html)) {
            if ($uth_center_links == 'true') {
                $wrapper = '<div class="align-center">';
                $end_wrapper = '</div>';
            } else {
                $wrapper = '<div>';
                $end_wrapper = '</div>';
            }
        } else {
            if ($uth_center_links == 'true') {
                $wrapper = '<p class="text-center">';
                $link_two_html = '';
                $end_wrapper = '</p>';
            } else {
                $wrapper = '<p>';
                $link_two_html = '';
                $end_wrapper = '</p>';
            }
        }

        // RENDER THE HTML
        $html = ' 
            ' . $wrapper . '
                ' . $link_one_html . '
                ' . $link_two_html . '
            ' . $end_wrapper . '
        ';

        return $html;
    }

}

new uth_link_group();