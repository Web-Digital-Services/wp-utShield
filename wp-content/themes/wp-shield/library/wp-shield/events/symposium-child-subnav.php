<?php
/** Get Child/Sibling Pages for Events/Symposiums Subnav */
function wpb_list_child_events() {  
	global $post; 
	if ( $post->post_parent )
		$childpages = wp_list_pages( 'post_type=events&sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
	else
		$childpages = wp_list_pages( 'post_type=events&sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
	if ( $childpages ) {
		if ( $post->post_parent )
			$string = '<ul class="line-delimited"><li><a href="' . site_url() . '?page_id=' . $post->post_parent . '">Event Overview</a></li>' . $childpages . '</ul>';
		else
			$string = '<ul class="line-delimited">' . $childpages . '</ul>';
		return $string;
	}
}
add_shortcode('wpb_childevents', 'wpb_list_child_events');