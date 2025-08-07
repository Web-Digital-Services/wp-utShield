<?php 
/*
Element Description: Block Quote (Orbit)
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/

// Element Class 
class uth_blockquote_orbit extends WPBakeryShortCode
{

    // Element Init
    function __construct()
    {
        add_action('init', array($this, 'vc_blockquote_orbit_mapping'), 12);
        add_shortcode('vc_blockquote_orbit', array($this, 'vc_blockquote_orbit_html'));
    }

    // Element Mapping
    public function vc_blockquote_orbit_mapping()
    {

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }

        // Map the block with vc_map()
        vc_map(

            array(
                //Define the name and description 
                'name' => __('Block Quote (Orbit)', 'wp-shield'),
                'base' => 'vc_blockquote_orbit',
                'description' => __('Add up to 4 quotes with authors in a slide show', 'wp-shield'),
                'category' => __('UT Health Designs', 'wp-shield'),
                'icon' => get_template_directory_uri().'/images/shield.png',
                'params' => array(
                    //do we want to just hard code 4 sets of author names/quotes?
                    // need to break up into 5 tabs 
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __('Author Name 1', 'wp-shield'),
                        'param_name' => 'author_name1',
                        'description' => __('The name of the person this is quoted from.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '1st Quote',
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __('Quote Text 1', 'wp-shield'),
                        'param_name' => 'quote_text1',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '1st Quote',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __('Button 1', 'wp-shield'),
                        'param_name' => 'button1',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'description' => __('Add a button as a link', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '1st Quote',
                    ),
                    //second set of blockquote data
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __('Author Name 2', 'wp-shield'),
                        'param_name' => 'author_name2',
                        'description' => __('The name of the person this is quoted from.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '2nd Quote',
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __('Quote Text 2', 'wp-shield'),
                        'param_name' => 'quote_text2',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '2nd Quote',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __('Button 2', 'wp-shield'),
                        'param_name' => 'button2',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'description' => __('Add a button as a link', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '2nd Quote',
                    ),
                    //third set of blockquote data
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __('Author Name 3', 'wp-shield'),
                        'param_name' => 'author_name3',
                        'description' => __('The name of the person this is quoted from.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '3rd Quote',
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __('Quote Text 3', 'wp-shield'),
                        'param_name' => 'quote_text3',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '3rd Quote',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __('Button 3', 'wp-shield'),
                        'param_name' => 'button3',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'description' => __('Add a button as a link', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '3rd Quote',
                    ),
                    //fourth set of blockquote data
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __('Author Name 4', 'wp-shield'),
                        'param_name' => 'author_name4',
                        'description' => __('The name of the person this is quoted from.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '4th Quote',
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __('Quote Text 4', 'wp-shield'),
                        'param_name' => 'quote_text4',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '4th Quote',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __('Button 4', 'wp-shield'),
                        'param_name' => 'button4',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'description' => __('Add a button as a link', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => '4th Quote',
                    ),
                    //design options
                    array(
                        'type' => 'textfield',
                        'heading' => __('Additional class', 'wp-shield'),
                        'param_name' => 'addl_class',
                        'description' => __('Add a class like "large" to alter the paragraph text.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    )
                )
            )
        );

    }

    // Element HTML
    public function vc_blockquote_orbit_html($atts, $content)
    {

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'author_name1' => '',
                    'quote_text1' => '',
                    'button1' => '',
                    'author_name2' => '',
                    'quote_text2' => '',
                    'button2' => '',
                    'author_name3' => '',
                    'quote_text3' => '',
                    'button3' => '',
                    'author_name4' => '',
                    'quote_text4' => '',
                    'button4' => '',
                    'addl_class' => ''
                ),
                $atts
            )
        );

        if (!empty($addl_class)) {
            $class = ' class="' . $addl_class . '"';
        }

        // Image check


        // Button options
        $button_one_html = '';
        $use_link1 = false;
        $button_one = vc_build_link($button1);
        if (strlen($button_one['url']) > 0) {
            $use_link1 = true;
            $a_ref1 = $button_one['url'];
            $a_ref1 = apply_filters('vc_btn_a_href', $a_ref1);
            $a_title1 = $button_one['title'];
            $a_title1 = apply_filters('vc_btn_a_title', $a_title1);
            $a_target1 = $button_one['target'];
            $a_rel1 = $button_one['rel'];

            $button_one_html = '<a style="margin-top: 0.5rem;" class="button" href="' . $a_ref1 . '" title="' . $a_title1 . '" target="' . $a_target1 . '" rel="' . $a_rel1 . '">
            ' . $a_title1 . '
            </a>';
        }
        
        $button_two_html = '';
        $use_link2 = false;
        $button_two = vc_build_link($button2);
        if (strlen($button_two['url']) > 0) {
            $use_link2 = true;
            $a_ref2 = $button_two['url'];
            $a_ref2 = apply_filters('vc_btn_a_href', $a_ref2);
            $a_title2 = $button_two['title'];
            $a_title2 = apply_filters('vc_btn_a_title', $a_title2);
            $a_target2 = $button_two['target'];
            $a_rel2 = $button_two['rel'];

            $button_two_html = '<a style="margin-top: 0.5rem;" class="button" href="' . $a_ref2 . '" title="' . $a_title2 . '" target="' . $a_target2 . '" rel="' . $a_rel2 . '">
            ' . $a_title2 . '
            </a>';
        }

        $button_three_html = '';
        $use_link3 = false;
        $button_three = vc_build_link($button3);
        if (strlen($button_three['url']) > 0) {
            $use_link3 = true;
            $a_ref3 = $button_three['url'];
            $a_ref3 = apply_filters('vc_btn_a_href', $a_ref3);
            $a_title3 = $button_three['title'];
            $a_title3 = apply_filters('vc_btn_a_title', $a_title3);
            $a_target3 = $button_three['target'];
            $a_rel3 = $button_three['rel'];

            $button_three_html = '<a style="margin-top: 0.5rem;" class="button" href="' . $a_ref3 . '" title="' . $a_title3 . '" target="' . $a_target3 . '" rel="' . $a_rel3 . '">
            ' . $a_title3 . '
            </a>';
        }

        $button_four_html = '';
        $use_link4 = false;
        $button_four = vc_build_link($button4);
        if (strlen($button_four['url']) > 0) {
            $use_link4 = true;
            $a_ref4 = $button_four['url'];
            $a_ref4 = apply_filters('vc_btn_a_href', $a_ref4);
            $a_title4 = $button_four['title'];
            $a_title4 = apply_filters('vc_btn_a_title', $a_title4);
            $a_target4 = $button_four['target'];
            $a_rel4 = $button_four['rel'];

            $button_four_html = '<a style="margin-top: 0.5rem;" class="button" href="' . $a_ref4 . '" title="' . $a_title4 . '" target="' . $a_target4 . '" rel="' . $a_rel4 . '">
            ' . $a_title4 . '
            </a>';
        }


        // Checks for author_name and quote_text if they exist, if they do display blockquote and add link to side of slide show
        $listItemBlock1 = '';
        $listItemBlock2 = '';
        $listItemBlock3 = '';
        $listItemBlock4 = '';

        $bullet1 = '';
        $bullet2 = '';
        $bullet3 = '';
        $bullet4 = '';

        if (!empty($author_name1) && !empty($quote_text1)) {
            $listItemBlock1 = '
                <li class="is-active orbit-slide">
                    <blockquote>
                        <p ' . $class . '>' . $quote_text1 . '</p>
                        <cite>' . $author_name1 . '</cite>
                    </blockquote>
                    ' . $button_one_html . '
                </li>
            ';

            $bullet1 = '
                <li><button class="is-active cell small-4" data-slide="0"><span class="show-for-sr">First slide
                    details.</span><span class="show-for-sr">Current Slide</span></button></li>
            ';
        } 
        
        if(!empty($author_name2) && !empty($quote_text2)) {
            $listItemBlock2 = '
                <li class="orbit-slide">
                    <blockquote>
                        <p ' . $class . '>' . $quote_text2 . '</p>
                        <cite>' . $author_name2 . '</cite>
                    </blockquote>
                    ' . $button_two_html . '
                </li>
            ';

            $bullet2 = '
                <li><button class="cell small-4" data-slide="1"><span class="show-for-sr">Second slide
                    details.</span></button></li>
            ';
        } 
        
        if(!empty($author_name3) && !empty($quote_text3)) {
            $listItemBlock3 = '
                <li class="orbit-slide">
                    <blockquote>
                        <p ' . $class . '>' . $quote_text3 . '</p>
                        <cite>' . $author_name3 . '</cite>
                    </blockquote>
                    ' . $button_three_html . '
                <li>
            ';

            $bullet3 = '
                <li><button class="cell small-4" data-slide="2"><span class="show-for-sr">Third slide
                    details.</span></button></li>
            ';
        }  
        
        if(!empty($author_name4) && !empty($quote_text4)) {
            $listItemBlock4 = '
                <li class="orbit-slide">
                    <blockquote>
                        <p ' . $class . '>' . $quote_text4 . '</p>
                        <cite>' . $author_name4 . '</cite>
                    </blockquote>
                    ' . $button_four_html . '
                </li>
            ';

            $bullet4 = '
                <li><button class="cell small-4" data-slide="3"><span class="show-for-sr">Fourth slide
                    details.</span></button></li>
            ';
        }


        // Need to add section for image and link
        // RENDER THE HTML
        $html = '       
            <div class="bleed color grey pullquote">
                <div class="grid-container">
                    <div class="orbit" role="region" aria-label="Slide show of quotes" data-orbit>
                        <div class="grid-x align-center-middle">
                            <div class="cell small-10">
                                <ul class="orbit-container">
                                    ' . $listItemBlock1 . '
                                    ' . $listItemBlock2 . '
                                    ' . $listItemBlock3 . '
                                    ' . $listItemBlock4 . '
                                </ul>
                            </div>
                            <div class="cell small-1">
                                <nav class="orbit-bullets">
                                    <ul class="no-bullet">
                                        ' . $bullet1 . '
                                        ' . $bullet2 . '
                                        ' . $bullet3 . '
                                        ' . $bullet4 . '
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';

        return $html;
    }
}

// Element Class Init
new uth_blockquote_orbit();