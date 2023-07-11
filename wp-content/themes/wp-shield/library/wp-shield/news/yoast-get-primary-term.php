<?php 
class wp_shield_get_category_terms{
	public $category_name;
	public $category_link;
	public $category_slug;
	public $args_related;
	public $news_SectionTitle;
}
function wp_shield_define_terms_with_YOAST(){
	// SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
	$category = get_the_category();
	$useCatLink = true;
	// If post has a category assigned.

	global $post;
	
	if ( class_exists('WPSEO_Primary_Term') )
	{
		// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
		$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
		$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
		$term = get_term( $wpseo_primary_term );

		if (is_wp_error($term)) { 
			//Yoast Enabled
			//No terms Selected
			$NewsFeedProperties = new ut_health_get_category_terms();
			$news_SectionTitle = 'Recent News';
			$args_related = 
				array(
					'posts_per_page' => 4,
					'post_type' => 'post',
					'post__not_in'   => array( $post->ID ),
				);
	
			$NewsFeedProperties->news_SectionTitle = $news_SectionTitle;
			$NewsFeedProperties->args_related = $args_related;
			
			return $NewsFeedProperties;

		} else { 
			//Yoast Enabled
			//Terms Selected
			$NewsFeedProperties = new ut_health_get_category_terms();

			// Yoast Primary category
			$category_name = $term->name;
			$category_slug = $term->slug;
			$category_link = get_category_link( $term->term_id );
			$news_SectionTitle = 'Read more about ' . $category_name;

			$args_related = 
			array(
				'posts_per_page' => 4,
				'post_type' => 'post',
				'post__not_in'   => array( $post->ID ),
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $category_slug,
					),
				),      
			);
			
			$NewsFeedProperties->category_name = $category_name;
			$NewsFeedProperties->category_slug = $category_slug;
			$NewsFeedProperties->category_link = $category_link;
			$NewsFeedProperties->news_SectionTitle = $news_SectionTitle;
			$NewsFeedProperties->args_related = $args_related;
			return $NewsFeedProperties;
		}
	}elseif(!empty($category[0]->name)) {
		//Yoast Disabled
		//Terms Selected
		$NewsFeedProperties = new wp_shield_get_category_terms();

		// Default, display the first category in WP's list of assigned categories
		$category_name = $category[0]->name;
		$category_slug = $category[0]->slug;
		$category_link = get_category_link( $category[0]->term_id );
		$news_SectionTitle = 'Read more about ' . $category_name;

		$args_related = 
		array(
			'posts_per_page' => 4,
			'post_type' => 'post',
			'post__not_in'   => array( $post->ID ),
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $category_slug,
				),
			),      
		);

		$NewsFeedProperties->category_name = $category_name;
		$NewsFeedProperties->category_slug = $category_slug;
		$NewsFeedProperties->category_link = $category_link;
		$NewsFeedProperties->news_SectionTitle = $news_SectionTitle;
		$NewsFeedProperties->args_related = $args_related;
		return $NewsFeedProperties;

	}else{
		//Yoast Disabled
		//Terms Empty
		$NewsFeedProperties = new ut_health_get_category_terms();
		$news_SectionTitle = 'Recent News';
		$args_related = 
			array(
				'posts_per_page' => 4,
				'post_type' => 'post',
				'post__not_in'   => array( $post->ID ),
			);

		$NewsFeedProperties->news_SectionTitle = $news_SectionTitle;
		$NewsFeedProperties->args_related = $args_related;
		
		return $NewsFeedProperties;
	}
}
?>