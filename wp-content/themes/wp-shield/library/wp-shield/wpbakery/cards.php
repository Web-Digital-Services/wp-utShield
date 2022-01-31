<?php
/*
Element Description: Card (Image Grouping)
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_card extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vs_card_mapping' ), 12 );
        add_shortcode( 'vs_card', array( $this, 'vs_card_html' ) );
    }
    // Element Mapping

    public function vs_card_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                'name' => __('Cards', 'wp-shield'),
                'base' => 'vs_card',
                'description' => __('Optional banner design for child pages', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'holder' => 'img',
                        'class' => '',
                        'heading' => __( 'Banner Image', 'wp-shield' ),
                        'param_name' => 'image_url',
                        'value' => __( '', 'wp-shield' ),
                        'description' => __( 'Featured image for the card', 'wp-shield' ),
                    ),    
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Card Title', 'wp-shield' ),
                        'param_name' => 'card_title',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textarea',
                        //'holder' => 'p',
                        'class' => 'text-class',
                        'heading' => __( 'Panel copy', 'wp-shield' ),
                        'param_name' => 'card_copy_text',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'Primary Call to Action', 'wp-shield' ),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( 'Place Link Here', 'wp-shield' ),
                        ),
                        //'description' => __( 'Select the URL here', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'Secondary Call to Action', 'wp-shield' ),
                        'param_name' => 'secondary_link',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( 'Secondary Link', 'wp-shield' ),
                        ),
                       // 'description' => __( 'Select the URL', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Image Size', 'wp-shield' ),
                        'param_name' => 'image_size',
                        'description' => esc_html__( 'Copy and paste one of the following thumbnail sizes "thumbnail", "medium", "large", "full" (thumbnail is the default),  ', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        //'group' => 'Content',
                    ),  
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Card Design',
                        'param_name' => 'card_style',
                        'group' => __( 'Design Options', 'wp-shield' ),
                        'value'      => array(
                            'Static Card'  => 'static',
                            'Popout Card'  => 'popout',
                            'Interactive Card'  => 'interactive',
                            'Nested Card'  => 'nested',
                            'Long Card'  => 'long',
                            'Post Card'  => 'postcard',
                        )
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Color Options',
                        'param_name' => 'color_options',
                        'group' => __( 'Design Options', 'wp-shield' ),
                        'value'      => array(
                            'Default (White)'  => 'white',
                            'Blue'  => ' color',
                            'Beige'  => ' color beige',
                            'Light Grey'  => ' color light-grey',
                            'Dark Grey'  => ' color dark-grey',
                            'Orange' => ' color orange',
                            'Darken (Red)'  => ' color darken'
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Enable Top Border (Panel Poput ONLY)', 'wp-shield' ),
                        'description' => esc_html__( 'This border option is only available for the panel popout design.', 'wp-shield' ),
                        'param_name' => 'enable_border',
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Design Options',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Heading Level',
                        'param_name' => 'heading_level',
                        'group' => __( 'Design Options', 'wp-shield' ),
                        'value'      => array(
                            'Select a heading level'  => '',
                            'Heading 2'  => 'h2',
                            'Heading 3'  => 'h3',
                            'Heading 4'  => 'h4',
                        )
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Equilizer ID', 'wp-shield' ),
                        'param_name' => 'equilizer_id',
                        'description' => esc_html__( 'This feature will can be used to match the heights of elements in the row. ', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'group' => 'Match Heights', 
                    )
                )
            )
        );                                
            
    }
    // Element HTML
    public function vs_card_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'card_title' => '',
                    'card_copy_text'   => '',
                    'image_url'   => 'image_url',
                    'enable_border' => '',
                    'url'   => '',
                    'secondary_link' => '',
                    'card_style' => '',
                    'heading_level' => '',
                    'image_size' => '',
                    'color_options' => '',
                    'equilizer_id' => ''
                ), 
                $atts
            )
        );
        
        #Load Equilizer To Match Heights
        if (!empty($equilizer_id)){
            $equilizer_id = 'data-equalizer-watch="' . $equilizer_id . '"';
        }else{
            $equilizer_id = '';
        }
        
        #If interactive, load link details, else, zero out the variables in use. 
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
        }else{
            $use_link = '';
            $a_ref = '';
            $a_title = '';
            $a_target = '';
            $a_rel = '';
        }
        $href_two = vc_build_link($secondary_link);
        if ( strlen ( $href_two['url'] ) > 0) {
            $use_link = true;
            $sec_url = $href_two['url'];
            $sec_ref = apply_filters( 'vc_btn_a_href', $sec_url);
            $sec_title = $href_two['title'];
            $sec_title = apply_filters( 'vc_btn_a_title', $sec_title);
            $sec_target = $href_two['target'];
            $sec_rel = $href_two['rel'];
        }else{
            $use_link = '';
            $sec_ref = '';
            $sec_title = '';
            $sec_target = '';
            $sec_rel = '';
        }
        /** Default Values if none are selected. **/
        if (empty($card_style)){
            $card_style = "static";
        }
        if (empty($heading_level)){
            $heading_level = "h3";
        }
        //If icon is disabled, use RULED Heading class
        if ($enable_border == 'true'){
            $border = 'border';
        }else{
            $border = '';
        }
        
        /** Getting Image Sizes **/
        $image_size_array = array("thumbnail", "medium", "large", "full");
        //Fix the thumbnail size if the user made a letter capital. 
        $image_size = strtolower($image_size);

        if (empty($image_size)){
            $image_size = 'thumbnail';
        }elseif(in_array($image_size, $image_size_array, true)){
            echo '<!-- thumbnail loaded properly -->';
        }else{
            //If the user doesnt type a propper thumbnail size. Use thumbnail
            $image_size = 'thumbnail';
        }
        //$image_id = wp_get_attachment_image_src( $image,  );
        /* Render image with CSS Classes */
        if ($card_style=='colorized_card'){
        	$cardImage = wp_get_attachment_image($image_url, $image_size, 'alt', array( 'class' => 'single-border single-border-bottom ' . $border_color  ) );
        }elseif($card_style=='panel outline popout'){
        	$cardImage = wp_get_attachment_image($image_url, $image_size, 'alt', array( 'class' => 'popout-item single-border single-border-top image-margin ' . $border_color ) );
        }else{
        	$cardImage = wp_get_attachment_image($image_url, $image_size, 'alt');
        }
        if (!empty ($a_title)){
            $featured_link = 'safasf<a class="carat-double" href="' . $a_ref . '" title="' . $a_title . '" rel="' . $a_rel . '">' . $a_title . '</a>';
        }else{
            $featured_link = '';
        }
        // Fill $html var with data

        /** Start Card Designs **/
        if ($card_style=='static' || $card_style=='popout'){
            //If card is Static, dont wrap in an A tag.
            if (!empty($a_title) && !empty($sec_url)){
                $load_primary_link = '<div class="button-group">
                <p><a class="button" href="' . $a_ref . '" title="' . $a_title . '" rel="' . $a_rel . '">' . $a_title . '</a></p>
                <p><a class="button ghost" href="' . $sec_url . '" title="' . $sec_title . '" rel="' . $sec_rel . '">' . $sec_title . '</a></p>
                </div>';
            }elseif(!empty($a_title) && empty($sec_url)){
                $load_primary_link = '<p><a class="arrow" href="' . $a_ref . '" title="' . $a_title . '" rel="' . $a_rel . '">' . $a_title . '</a></p>';
            }else{
                $load_primary_link = '';
            }
            $html =
                '<div class="card ' . $card_style . ' ' . $color_options . ' ' . $border . '" ' . $equilizer_id . '>
                    <div class="card-section">
                        ' .  $cardImage . '
                        <' . $heading_level . '>' . $card_title . '</' . $heading_level . '>
                            <p>' . $card_copy_text . '</p>
                            ' . $load_primary_link . '
                    </div>
                </div>';
         }elseif($card_style=='interactive'){
            $html ='
                <a class="card ' . $color_options . '" href="' . $a_ref . '" title="' . $a_title . '" rel="' . $a_rel . '" ' . $equilizer_id . '>
                    ' .  $cardImage . '
                    <div class="card-section">
                        <' . $heading_level . '>' . $card_title .'</' . $heading_level . '>
                        <p>' . $card_copy_text . '</p>
                    </div>                
                </a>';
         }elseif($card_style=='nested'){
            $html ='
            <div class="cell nested' . $color_options . '" ' . $equilizer_id . '>
                <a class="card" href="' . $a_ref . '" title="' . $a_title . '" rel="' . $a_rel . '">
                    ' .  $cardImage . '
                    <div class="card-section">
                        <' . $heading_level . '>' . $card_title .'</' . $heading_level . '>
                    </div>                
                </a>
            </div>';
         }elseif($card_style=='long'){
             $html='
             <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <a class="card cell small-12 medium-12" href="' . $a_ref . '" title="' . $a_title . '" rel="' . $a_rel . '">
                        <div class="align-middle grid-x grid-margin-x">
                            <div class="cell small-5">
                                ' .  $cardImage . '
                            </div>
                            <div class="small-5 cell">
                                <' . $heading_level . '>' . $card_title .'</' . $heading_level . '>
                            </div>
                        </div>
                    </a>
                </div>
            </div>';
         }elseif($card_style=='postcard'){
            $html =
                '<a class="card postcard cell small-12 large-12" href="' . $a_ref . '" title="' . $a_title . '" rel="' . $a_rel . '" ' . $equilizer_id . '>
                    ' .  $cardImage . '
                    <div class="card-section">
                        <' . $heading_level . '>' . $card_title .'</' . $heading_level . '>
                        <p>' . $card_copy_text . '</p>
                    </div>
                </a>';
         }else{
             echo 'Error: Please select a design style for this card';
         }
        return $html; 
    }
     
} // End Element Class
 
// Element Class Init
new uth_card();    