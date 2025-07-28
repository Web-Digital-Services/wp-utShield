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
                'name' => __('Block Quote', 'wp-shield'),
                'base' => 'vc_author_quote',
                'description' => __('A callout section with a quote, with options for an image and/or a link', 'wp-shield'),
                'category' => __('UT Health Designs', 'wp-shield'),
                'icon' => get_template_directory_uri().'/images/shield.png',
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
                    'image_url' => '',
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


        // Conditionally add CSS class to hide image, and fill content area if no image is selected
        $cardImage = '';
        $image_column_class = '';
        $content_column_class = 'cell small-12 medium-6 large-8 margin-top';

        if (empty($image_url)) {
            // If no custom image is selected, hide the default image, apply class to fill space for empty image
            $cardImage = '<img src="" class="margin-bottom" style="display: none;" alt="">';
            $content_column_class = 'cell small-12 medium-10 large-11 margin-top';
        } elseif ($image_url === 'image_url') {
            // If the default image is selected, hide it using style attribute, apply class to fill space for empty image
            $cardImage = wp_get_attachment_image($image_url, 'large', 'alt', array('class' => 'margin-bottom', 'style' => 'display: none;'));
            $content_column_class = 'cell small-12 medium-10 large-11 margin-top';
        } else {
            // If a custom image is selected, render it normally, apply class to compensate for image size
            $cardImage = wp_get_attachment_image($image_url, 'large', 'alt', array('class' => 'margin-bottom'));
            $image_column_class = 'cell small-12 medium-4 large-3';
        }

        // Image location functionality, dropdown to add classes
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

        /*
            Check if we have an image, if we do create a div with image classes, classes for mobile order and add the actual image
            If we do not have an image, omit the div with classes for the image and the image itself
        */

        // RENDER THE HTML
        $html = '
            <div class="grid-container">
                <div class="grid-x grid-margin-x align-center-middle">
                    ' . (!empty($image_url) ? '<div class="' . $image_column_class . ' ' . $image_order_class . '">' . $cardImage . '</div>' : '') . '
                    <div class="' . $content_column_class . ' ' . $content_order_class . '">
                        <blockquote ' . $quoteclass . '>
                            <p ' . $class . '>' . $quote_text . '</p>
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
