<?php 
/** Creates a shortcode to integrate social media links into the footer. **/

function UTH_social_media_links(){
	$UTH_social_facebook = get_theme_mod( 'UTH_social_facebook');
	$UTH_social_twitter = get_theme_mod( 'UTH_social_twitter');
	$UTH_social_instagram = get_theme_mod( 'UTH_social_instagram');
	$UTH_social_youtube = get_theme_mod( 'UTH_social_youtube');
	$UTH_social_linkedin = get_theme_mod( 'UTH_social_linkedin');

	if(!empty($UTH_social_facebook || $UTH_social_twitter || $UTH_social_instagram || $UTH_social_youtube || $UTH_social_linkedin)){
		$social_media_link_html = '<ul>';
		if(!empty($UTH_social_facebook)){ 
			$social_media_link_html .= '<li><a aria-label="Visit the UT Health Facebook" href="' . $UTH_social_facebook .'"><i class="fab fa-facebook-square fa-2x"></i></a></li>';
		}
		if(!empty($UTH_social_twitter)){ 
			$social_media_link_html .= '<li><a aria-label="Visit the UT Health Twitter" href="' . $UTH_social_twitter .'"><i class="fa-brands fa-x-twitter fa-2x"></i></a></li>';
		}
		if(!empty($UTH_social_linkedin)){ 
			$social_media_link_html .= '<li><a aria-label="Visit the UT Health Linkedin" href="'. $UTH_social_linkedin .'"><i class="fab fa-linkedin fa-2x"></i></a></li>';
		}
		if(!empty($UTH_social_youtube)){ 
			$social_media_link_html .= '<li><a aria-label="Visit the UT Health YouTube" href="'. $UTH_social_youtube .'"><i class="fab fa-youtube-square fa-2x"></i></a></li>';
		}
		if(!empty($UTH_social_instagram)){ 
			$social_media_link_html .= '<li><a aria-label="Visit the UT Health Instagram" href="'. $UTH_social_instagram .'"><i class="fab fa-instagram-square fa-2x"></i></a></li>';
		}
		$social_media_link_html .= '</ul>';

		return $social_media_link_html;
	}else{
		$social_media_link_html = '<ul>';
		$social_media_link_html .= '<li><a aria-label="Visit the UT Health Facebook" href="https://www.facebook.com/UTHealthSA"><i class="fab fa-facebook-square fa-2x"></i></a></li>';
		$social_media_link_html .= '<li><a aria-label="Visit the UT Health Instagram" href="https://www.instagram.com/uthealthsa/"><i class="fab fa-instagram-square fa-2x"></i></a></li>';
		$social_media_link_html .= '<li><a aria-label="Visit the UT Health Linkedin" href="https://www.linkedin.com/school/uthealthsa/"><i class="fab fa-linkedin fa-2x"></i></a></li>';
		$social_media_link_html .= '<li><a aria-label="Visit the UT Health Twitter" href="https://twitter.com/uthealthsa"><i class="fa-brands fa-x-twitter fa-2x"></i></a></li>';
		$social_media_link_html .= '<li><a aria-label="Visit the UT Health YouTube" href="https://www.youtube.com/uthscsa/"><i class="fab fa-youtube-square fa-2x"></i></a></li>';
		$social_media_link_html .= '</ul>';

		return $social_media_link_html;
	}
}
add_shortcode( 'UTH_social_links', 'UTH_social_media_links' );
