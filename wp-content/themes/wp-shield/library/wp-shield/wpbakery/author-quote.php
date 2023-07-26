<?php
/*
Element Description: Author Quote block type
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_author_quote extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_author_quote_mapping' ), 12 );
        add_shortcode( 'vc_author_quote', array( $this, 'vc_author_quote_html' ) );
    }
    // Element Mapping

    public function vc_author_quote_mapping() {       
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Block Quote', 'ut-health'),
                'base' => 'vc_author_quote',
                'description' => __('Another simple VC box', 'ut-health'), 
                'category' => __('UT Health Designs', 'ut-health'),   
                'icon' => get_template_directory_uri().'/assets/images/core/shield.png', 
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    //array(
                    //    'type' => 'attach_image',
                    //    'holder' => 'img',
                    //    'class' => '',
                    //    'heading' => __( 'Author Image', 'ut-health' ),
                    //   'param_name' => 'image_url',
                    //    'value' => __( '', 'ut-health' ),
                    //    'description' => __( 'Featured image for the author', 'ut-health' ),
                    //),    
                    array(
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Author Name', 'ut-health' ),
                        'param_name' => 'author_name',
                        'description' => __( 'Use the name of the person this is quoted from. You can also include credentials or titles.', 'ut-health' ),
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textarea',
                        //'holder' => 'p',
                        'class' => 'text-class',
                        'heading' => __( 'Quote Text', 'ut-health' ),
                        'param_name' => 'quote_text',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Additional class', 'ut-health' ),
                        'param_name' => 'addl_class',
                        'description' => __( 'Add a class to the paragraph tag surrounding the quote text.', 'ut-health' ),
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    /*
                    array(
                        'type' => 'vc_link',
                        'heading' => __( 'URL', 'ut-health' ),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __( 'Place Link Here', 'ut-health' ),
                        ),
                        'description' => __( 'Select the URL here', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ), 
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Image Size', 'ut-health' ),
                        'param_name' => 'image_size',
                        'description' => esc_html__( 'Copy and paste one of the following thumbnail sizes "thumbnail", "medium", "large", "full" (thumbnail is the default),  ', 'ut-health' ),
                        'value' => __( '', 'ut-health' ),
                        //'group' => 'Content',
                    ),  */
                    //array(
                    //    'type'       => 'dropdown',
                    //    'class'      => '',
                    //    'heading'    => 'Block Design',
                    //    'param_name' => 'block_design',
                    //    'group' => __( 'Design options', 'ut-health' ),
                    //    'value'      => array(
                    //        'Select a quote design'  => '',
                    //        'Panel Quote'  => 'panel_design',
                    //        'Full Row Design'  => 'full_row',
                    //        'Panel Alpha (Advanced)'  => 'panel_alpha',
                    //
                    //    )
                    //),
                    //array(
                    //    'type'       => 'dropdown',
                    //    'class'      => '',
                    //    'heading'    => 'Color Options',
                    //    'param_name' => 'color_options',
                    //    'group' => __( 'Design options', 'ut-health' ),
                    //    'value'      => array(
                    //        'Select a color'  => '',
                    //        'Theme Color'  => 'theme_color',
                    //        'Theme Color (Darken)'  => 'theme_darken',
                    //        'Academics (Green)'  => 'green',
                    //        'Institutional (Purple)'  => 'purple',
                    //        'Patient Care (Blue)'  => 'blue',
                    //        'Research (Brown)' => 'brown',
                    //        'Orange'  => 'orange',
                            //'White'  => 'white-background',
                    //    )
                    //),
                    //array(
                    //    'type'       => 'dropdown',
                    //    'class'      => '',
                    //    'heading'    => 'Text Size',
                    //    'param_name' => 'quote_size',
                    //    'group' => __( 'Design options', 'ut-health' ),
                    //    'value'      => array(
                    //        'Select quote size'  => '',
                    //        'Small'  => 'small',
                    //        'Average Size'  => 'average',
                    //    )
                    //),
                    //array(
                    //    'type' => 'textfield',
                    //    'heading' => __( 'Equilizer ID', 'ut-health' ),
                    //    'param_name' => 'equilizer_id',
                    //    'description' => esc_html__( 'This feature will can be used to match the heights of elements in the row. ', 'ut-health' ),
                    //    'value' => __( '', 'ut-health' ),
                    //    'group' => 'Match Heights', 
                    //)
                )
            )
        );                                
            
    }

    // Element HTML
    public function vc_author_quote_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    //'image_url'   => 'image_url',
                    'author_name' => '',
                    'quote_text'   => '',
                    'addl_class'   => '',
                    //'quote_size' => '',
                    //'color_options' => '',
                    //'equilizer_id' => '',
                    //'block_design' => ''
                    //'url'   => '',
                    //'image_size' => '',
                ), 
                $atts
            )
        );
        /** Define Image Options */
        //if (!empty ($image_url)){
        //    $cardImage = wp_get_attachment_image($image_url, 'medium', 'alt');
        //}else{
        //    $cardImage = '';
        //}
        /** Define Text Size Options */
        //if ($quote_size =="small"){
        //    $quote_size="small";
        //}else{
        //    $quote_size="large";
        //}
        /** Define Block Type Designs */
        //if ($block_design == 'panel_design'){
        //    $quote_styles = 'panel far-notso';
        //    $image_wrapper = 'class="bleed"'; 
        //}elseif($block_design == 'full_row'){
        //    $quote_styles = '';
        //    $image_wrapper = ''; 
        //}elseif($block_design='panel_alpha'){
        //    $quote_styles = 'panel colorized alpha';
        //    $image_wrapper = ''; 
        //}else{
        //    $quote_styles = 'panel colorized colorized-theme far-notso';
        //    $image_wrapper = ''; 
        //}

        /** Define Colors */
        //switch ($color_options){
        //	case 'theme_color':
        //        $background_color = 'colorized colorized-theme';
        //        break;
            
        //    case 'theme_darken':
        //        $background_color = 'colorized colorized-theme-darken';
        //        break;
                
        //    case 'purple':
        //        $background_color = 'colorized colorized-institutional';
        //        break;

        //    case 'blue':
        //        $background_color = 'colorized colorized-patientcare';
        //        break;

        //    case 'green':
        //        $background_color = 'colorized colorized-academics';
        //        break;
            
        //    case 'brown':
        //        $background_color = 'colorized colorized-research';
        //        break;
            
        //    case 'orange':
        //        $background_color = 'colorized';
        //        break;
            
        //    case '':
        //        $background_color = '';
        //        break;        
        //}
        // RENDER THE HTML
        if (!empty($addl_class)){
            $class = ' class="' . $addl_class . '"';
        }
        $html = '
            <blockquote class="' . $quote_size . '"><p' . $class . '>' . $quote_text . ' 
                    </p><cite>' . $author_name . '</cite>
                    </blockquote>';
         
        return $html;
         
    }
     
} // End Element Class
 
// Element Class Init
new uth_author_quote();    