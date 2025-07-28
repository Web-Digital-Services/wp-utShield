<?php
/*
Element Description: Video Embed
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_video_embed extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_video_embed_mapping' ), 12 );
        add_shortcode( 'vc_video_embed', array( $this, 'vc_video_embed_html' ) );
    }
    // Element Mapping

    public function vc_video_embed_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                'name' => __('Video Embed', 'wp-shield'),
                'base' => 'vc_video_embed',
                'description' => __('Embed Youtube or Vimeo Videos', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),
                'icon' => get_template_directory_uri().'/images/shield.png',           
                'params' => array(
                    array(
                        'type' => 'textfield',
                        //'holder' => 'h2',
                        //'class' => 'text-class',
                        'heading' => __( 'Video URL', 'wp-shield' ),
                        'description' => __('Videos must be Youtube or Vimeo URLs', 'wp-shield'), 
                        'param_name' => 'video_url',
                        //'group' => 'Panel Content',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Video Title', 'wp-shield' ),
                        'description' => __('This will not be visible but is needed for accessibility requirements', 'wp-shield'), 
                        'param_name' => 'video_title',
                        //'group' => 'Panel Content',
                    )                  
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_video_embed_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'video_url'   => '',
                    'video_title' => '',

                ), 
                $atts
            )
        );

        //Featured Video Code
        if(!empty($video_url) && (strpos($video_url, 'https://youtu.be/') === 0)){

            //Youtube Video URL Conversion. Converts a view URL into an embed and wraps it in an iframe. - JMO 
            $old_text = array("https://youtu.be/");
            $new_text = array("https://www.youtube.com/embed/");
            $new_video_url = str_replace($old_text, $new_text, $video_url);
            
            $html = '<div class="flex-video widescreen"><iframe src="' . $new_video_url . '" title="' . $video_title . '" allowfullscreen></iframe></div>';

            }elseif(!empty($video_url) && (strpos($video_url, 'https://vimeo.com/') === 0)) {

            $old_text = array("https://vimeo.com/");
            $new_text = array("https://player.vimeo.com/video/");
            $new_video_url = str_replace($old_text, $new_text, $video_url);
            
            $html = '<div class="flex-video widescreen"><iframe src="' . $new_video_url . '" title="' . $video_title . '" allowfullscreen></iframe></div>';

            }elseif(!empty($video_url) && (strpos($video_url, 'https://www.youtube.com/watch?v=') === 0)) {

            $old_text = array("https://www.youtube.com/watch?v=");
            $new_text = array("https://www.youtube.com/embed/");
            $new_video_url = str_replace($old_text, $new_text, $video_url);
            
            $html = '<div class="flex-video widescreen"><iframe src="' . $new_video_url . '" title="' . $video_title . '" allowfullscreen></iframe></div>';

            }else{
                $html = 'This video URL is not meeting the requirements.';
            }
        return $html;
    }
     
} // End Element Class
 
// Element Class Init
new uth_video_embed();    