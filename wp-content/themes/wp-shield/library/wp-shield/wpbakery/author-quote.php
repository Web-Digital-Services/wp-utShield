<?php
/*
Element Description: Author Quote block type
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/

// Element Class 
class uth_author_quote extends WPBakeryShortCode
{

    // Element Init
    function __construct()
    {
        add_action('init', array($this, 'vc_author_quote_mapping'), 12);
        add_shortcode('vc_author_quote', array($this, 'vc_author_quote_html'));
    }
    // Element Mapping

    public function vc_author_quote_mapping()
    {

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }
        // Map the block with vc_map()
        vc_map(

            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Block Quote', 'ut-health'),
                'base' => 'vc_author_quote',
                'description' => __('A callout section with a quote, with options for an image and/or a link', 'ut-health'),
                'category' => __('UT Health Designs', 'ut-health'),
                'icon' => get_template_directory_uri() . '/assets/images/core/shield.png',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'holder' => 'img',
                        'class' => '',
                        'heading' => __('Author Image', 'wp-shield'),
                        'param_name' => 'image_url',
                        'value' => __('', 'wp-shield'),
                        'description' => __('Featured image for the author', 'wp-shield'),
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __('Author Name', 'wp-shield'),
                        'param_name' => 'author_name',
                        'description' => __('Use the name of the person this is quoted from. You can also include credentials or titles.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'textarea',
                        //'holder' => 'p',
                        'class' => 'text-class',
                        'heading' => __('Quote Text', 'wp-shield'),
                        'param_name' => 'quote_text',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __('URL', 'wp-shield'),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'description' => __('Select the URL here', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __('Button', 'wp-shield'),
                        'param_name' => 'button_url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'description' => __( 'Add a button as a link', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => 'Design Options',
                        'param_name' => 'row_design_options',
                        'group' => 'Design Options',
                        'value' => array(
                            'Bleeding Image Left' => 'img_bleed_left',
                            'Bleeding Image Right' => 'img_bleed_right'
                        )
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => 'Button Styles',
                        'param_name' => 'uth_button_style',
                        'group' => 'Design Options',
                        'value' => array(
                            'Orange' => 'color orange',
                            'White' => 'white'                      
                        )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __('Additional class', 'wp-shield'),
                        'param_name' => 'addl_class',
                        'description' => __('Add a class to the paragraph tag surrounding the quote text.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __('Additional class on blockquote', 'wp-shield'),
                        'param_name' => 'addl_quote_class',
                        'description' => __('Add a class to the blockquote tag surrounding the quote text.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),
                )
            )
        );

    }

    // Element HTML
    public function vc_author_quote_html($atts, $content)
    {

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'image_url' => 'image_url',
                    'author_name' => '',
                    'quote_text' => '',
                    'url' => '',
                    'button_url' => '',
                    'row_design_options' => '',
                    'uth_button_style' => '',
                    'addl_class' => '',
                    'addl_quote_class' => ''
                ),
                $atts
            )
        );
        // Define Image Options 
        if (!empty($image_url)) {
            $cardImage = wp_get_attachment_image($image_url, 'medium', 'alt');
        } else {
            $cardImage = '';
        }

        // Image location functionality, dropdown to add classes
        // By default lets set the row_design_options to use image_bleed_left
        if (empty($row_design_options)) {
            $row_design_options = 'img_bleed_left';
        }

        // Logic for switching image location, needed to be image_bleed_left to work here
        if ($row_design_options == 'img_bleed_left') {
            $image_order_class = 'small-order-1 medium-order-2';
            $content_order_class = 'small-order-1 medium-order-2';
        } else {
            $image_order_class = 'small-order-1 medium-order-2';
            $content_order_class = 'small-order-2 medium-order-1';
        }

        // Additional classes 
        if (!empty($addl_class)) {
            $class = ' class="' . $addl_class . '"';
        }
        if (!empty($addl_quote_class)) {
            $quoteclass = ' class="' . $addl_quote_class . '"';
        }

        // Link for blockquote
        if (!empty($url)) {
            $link = vc_build_link($url);
            $href = $link['url'];
            $title = !empty($link['title']) ? $link['title'] : '';
            $url = '<p style="margin-top: 0.5rem;"><a href="' . $href . '" title="' . $title . '" class="arrow">'. $title .'</a></p>';
        } else {
            $url = '';
        }

        // Option for cite tag to be link?


        // Button option
        $use_link = false;
        $button_one = vc_build_link($button_url);
        if (strlen($button_one['url']) > 0) {
            $use_link = true;
            $a_ref = $button_one['url'];
            $a_ref = apply_filters('vc_btn_a_href', $a_ref);
            $a_title = $button_one['title'];
            $a_title = apply_filters('vc_btn_a_title', $a_title);
            $a_target = $button_one['target'];
            $a_rel = $button_one['rel'];

            $button_one_html = '<a style="margin-top: 0.5rem;" class="button ' . $uth_button_style . '" href="' . $a_ref . '" title="' . $a_title . '" target="' . $a_target . '" rel="' . $a_rel . '">
            ' . $a_title . '
            </a>';
        }

        // RENDER THE HTML
        $html = '
            <div class="grid-container">
                <div class="grid-x grid-margin-x align-center-middle">
                    <div class="cell small-12 medium-4 large-3 ' . $image_order_class . '">
                        ' . $cardImage . '
                    </div>
                    <div class="cell small-12 medium-6 large-8 margin-top ' . $content_order_class . '">
                        <blockquote class="' . $quoteclass . '">
                            <p class="' . $class . '">' . $quote_text . '</p>
                            <cite>' . $author_name . '</cite>
                        </blockquote>
                        ' . $url . ' 
                        ' . $button_one_html . ' 
                    </div>
                </div>
            </div>
        ';

        return $html;

    }

} // End Element Class

// Element Class Init
new uth_author_quote();
