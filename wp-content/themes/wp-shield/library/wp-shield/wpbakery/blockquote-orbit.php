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
                'icon' => get_template_directory_uri() . '/dist/assets/images/core/shield.png',
                'params' => array(
                    //do we want to just hard code 4 sets of author names/quotes?
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
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __('Quote Text 1', 'wp-shield'),
                        'param_name' => 'quote_text1',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
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
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __('Quote Text 2', 'wp-shield'),
                        'param_name' => 'quote_text2',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
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
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __('Quote Text 3', 'wp-shield'),
                        'param_name' => 'quote_text3',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
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
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __('Quote Text 4', 'wp-shield'),
                        'param_name' => 'quote_text4',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
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
                    'author_name2' => '',
                    'quote_text2' => '',
                    'author_name3' => '',
                    'quote_text3' => '',
                    'author_name4' => '',
                    'quote_text4' => '',
                    'addl_class' => ''
                ),
                $atts
            )
        );

        if (!empty($addl_class)) {
            $class = ' class="' . $addl_class . '"';
        }

        //checks for author_name and quote_text if they exist, if they do display blockquote and add link to side of slide show
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
                </li>
            ';

            $bullet4 = '
                <li><button class="cell small-4" data-slide="3"><span class="show-for-sr">Fourth slide
                    details.</span></button></li>
            ';
        }

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