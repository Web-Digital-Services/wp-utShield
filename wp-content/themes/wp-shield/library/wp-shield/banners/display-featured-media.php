<?php 
/** 
 * 
 * Featured Video Function will take Youtube and Vimeo URL's and 
 * wrap them in a responsive embed using a basic meta field in the post or page
 * 
 **/

function load_featured_media( $thumbnail_size ){
	$ut_featured_video_url = get_post_meta( get_the_ID(), 'ut_featured_video_url', true ); 
	$ut_featured_video_title = get_post_meta( get_the_ID(), 'ut_featured_video_title', true ); 
  
  if(!empty($ut_featured_video_url) && (strpos($ut_featured_video_url, 'https://youtu.be/') === 0)){

    //Youtube Video URL Conversion. Converts a view URL into an embed and wraps it in an iframe. - JMO 
    $old_text = array("https://youtu.be/");
    $new_text = array("https://www.youtube.com/embed/");
    $new_video_url = str_replace($old_text, $new_text, $ut_featured_video_url);
    
    echo '<div class="flex-video widescreen"><iframe title="' . $ut_featured_video_title .'" src="' . $new_video_url . '" allowfullscreen></iframe></div>';

    }elseif(!empty($ut_featured_video_url) && (strpos($ut_featured_video_url, 'https://vimeo.com/') === 0)) {

      $old_text = array("https://vimeo.com/");
      $new_text = array("https://player.vimeo.com/video/");
      $new_video_url = str_replace($old_text, $new_text, $ut_featured_video_url);
      echo '<div class="flex-video widescreen"><iframe title="' . $ut_featured_video_title .'" src="' . $new_video_url . '" allowfullscreen></iframe></div>';

    }elseif(!empty($ut_featured_video_url) && (strpos($ut_featured_video_url, 'https://www.youtube.com/watch?v=') === 0)) {

       $old_text = array("https://www.youtube.com/watch?v=");
       $new_text = array("https://www.youtube.com/embed/");
       $new_video_url = str_replace($old_text, $new_text, $ut_featured_video_url);
       echo '<div class="flex-video widescreen"><iframe title="' . $ut_featured_video_title .'" src="' . $new_video_url . '" allowfullscreen></iframe></div>';

    }elseif ( has_post_thumbnail() ) {
        echo '<div class="wp-caption far">';
        the_post_thumbnail($thumbnail_size, array( 'class' => '' ));
        if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ){
          echo '<figcaption class="wp-caption-text">' . $caption . '</figcaption>';
        }
        echo '</div>';
    }else {
        //Do Nothing
    }
}