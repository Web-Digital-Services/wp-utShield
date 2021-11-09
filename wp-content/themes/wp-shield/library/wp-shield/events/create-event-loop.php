<?php
/**
** Description: This is a shortcode to event loops instead of having this code written on various pages. 
** Example usage of this shortcode: [create_events_loop events_per_page="10" show_past_events="false"]
** or [create_events_loop]
** By default this shortcode will have 10 posts per page, will be paginated and will show future events. 
**
** Documentation on Loop: https://developer.wordpress.org/reference/classes/wp_query/
**
** Parameters / Shortcode Attributes: 
** - events_per_page="X" -> How many posts per page to show
** - show_past_events="X" -> Only accepts "True" as an alternative option. Defaults to show future events. 
** - pagination="disable" -> If you want to disable pagination, set the pagination attribute to false. Defaults to pagination enabled.
** - design="" -> 4 options available: White Cards, Colorized, Tan, and sidebar... Each has its own template file design. 
** - feed_title -> this is only used on the sidebar template. In case you want to show past events... Accepts and text as a parameter. Defaults to "Upcoming events"
**/ 
function create_events_loop($atts){
	 // Get the current date to compare against. Note this has to be the same format as the event-alt-date
	$a = shortcode_atts( array(
		'events_per_page' => '10',
		'show_past_events' => 'false',
		'pagination' => 'enabled',
		'feed_title' => 'Upcoming Events',
		'design' => 'white cards',
		'url' => 'events/',
		'taxonomy_term' => '',
		'taxonomy_name' => ''
	), $atts );

	$todays_date = date('Y-m-d',strtotime("today"));
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	//$timeFilter = 'past';
	if ($a['show_past_events'] == 'false'){
		//Show Future Events
		$PastOrPresent = '>=';
		$sortBy_Asc_Desc = 'ASC';
	}else{
		//Show Past Events
		$PastOrPresent = '<=';
		$sortBy_Asc_Desc = 'Desc';
	}
	/** Load Design Options **/
	if ($a['design'] == 'white cards'){
		$wrapper_opening_class = '<ul class="loose-list line-delimited">';
		$template_part = "template-parts/content-types/events/cards/single-event-list";
		$wrapper_closing_class = '</ul">';
	}elseif($a['design'] == 'colorized'){
		//do nothing
		$template_part = "template-parts/content-types/events/cards/single-event-card";
	}elseif($a['design'] == 'tan'){
		$template_part = "template-parts/content-types/events/single-event-tan";
	}elseif($a['design'] == 'sidebar'){
		$wrapper_opening_class = '<h2 class="page-header text-center close">' . $a['feed_title'] . '</h2><div class="panel"><ul class="loose-list line-delimited">';
		$template_part = "template-parts/content-types/events/cards/single-event-sidebar";
		$wrapper_closing_class = '</ul><p class="text-center"><a class="button carat-double" href="' . get_site_url() . '/' . $a['url'] . '">View upcoming events</a></p></div>';
	}
	$tax = ['tax_query' => array(  
				array(
            	'taxonomy' => $a['taxonomy_name'],
            	'field'    => 'slug',
            	'terms'    => $a['taxonomy_term'],
        	)
    	),];
		$main_event_args = array(
			'post_type' => 'events',
			'posts_per_page' => $a['events_per_page'],
			'paged' => $paged,
			//meta_key: Loads the event date field that is in YYYY-MM-DD format.
			//orderby: Sorts by the meta_key value you declared. Loads the database key
			//meta_type: Tells the loop what type of meta_key you are using. 
			//Switched from DATE to DATETIME Specifically updated for Neurosurgery to sort conference room reservations. 
			'meta_key'  => 'event-alt-date',
			'orderby'	=> 'meta_value',
			'meta_type' => 'DATETIME',
			//Meta_query: Compare the event-alt-date to todays date to see if we are loading past or future events based on todays date. 
			'meta_query' => array(
		        array(
					'key' => 'event-alt-date',
					'value' => $todays_date,
					'compare' => $PastOrPresent,
					'type' => 'DATE'
		        )
		    ),
			'order'		=> $sortBy_Asc_Desc,
	);
			
		
	if ( isset( $atts[ 'taxonomy_name' ], $atts[ 'taxonomy_term' ] ) ) {
		$main_event_args = array_merge($main_event_args, $tax);
	}

	 
	$ut_events_query = new WP_Query( $main_event_args );
	ob_start();

	/** Opening Wrapper Classes **/
	if (!empty($wrapper_opening_class)){echo $wrapper_opening_class;}
	
	/** Start the Loop **/
	if ( $ut_events_query->have_posts() ) :  while ( $ut_events_query->have_posts() ) : $ut_events_query->the_post();
		/** Load the loop template design **/
		if (!empty($template_part)){
			get_template_part( $template_part, get_post_format() );
		}else{
			echo 'design error';
		}
	    // End the Loop
	    endwhile;

    	/** Closing Wrapper Classes **/
		if (!empty($wrapper_closing_class)){echo $wrapper_closing_class;}
		/** Pagination **/
	    if ($a['pagination'] == 'enabled'){
			echo paginate_links( array(
				'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'total'        => $ut_events_query->max_num_pages,
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'format'       => '?paged=%#%',
				'show_all'     => false,
				'type'         => 'plain',
				'add_args'     => false,
				'add_fragment' => '',
			) );
			}else{
				//do nothing
			}	
	else:
		// If no posts match this query, output this text in black.
	?>	<p class="text-center black-text">
			<?php echo pl__('There are no events at this time. Please check back later.'); ?> 
		</p>	
		<?php 
	endif;
	$output_string = ob_get_contents();
	ob_end_clean();
	wp_reset_postdata();
	return $output_string;	
}
add_shortcode( 'create_events_loop', 'create_events_loop' );