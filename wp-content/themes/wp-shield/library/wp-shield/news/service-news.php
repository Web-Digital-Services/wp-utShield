<?php
/**
 * News feeds for GCCRI Core & Research Services pages.
 *
 * @package FoundationPress
 */

if ( ! defined( 'UTH_SERVICE_NEWS_TAXONOMY' ) ) {
	define( 'UTH_SERVICE_NEWS_TAXONOMY', 'core_research_service' );
}

/**
 * Register a post taxonomy so editors can tag news to a specific service page.
 */
function uth_register_service_news_taxonomy() {
	$labels = array(
		'name'                       => __( 'Core & Research Services', 'foundationpress' ),
		'singular_name'              => __( 'Core & Research Service', 'foundationpress' ),
		'search_items'               => __( 'Search Core & Research Services', 'foundationpress' ),
		'popular_items'              => __( 'Popular Core & Research Services', 'foundationpress' ),
		'all_items'                  => __( 'All Core & Research Services', 'foundationpress' ),
		'edit_item'                  => __( 'Edit Core & Research Service', 'foundationpress' ),
		'update_item'                => __( 'Update Core & Research Service', 'foundationpress' ),
		'add_new_item'               => __( 'Add New Core & Research Service', 'foundationpress' ),
		'new_item_name'              => __( 'New Core & Research Service Name', 'foundationpress' ),
		'separate_items_with_commas' => __( 'Separate services with commas', 'foundationpress' ),
		'add_or_remove_items'        => __( 'Add or remove services', 'foundationpress' ),
		'choose_from_most_used'      => __( 'Choose from the most used services', 'foundationpress' ),
		'not_found'                  => __( 'No services found.', 'foundationpress' ),
		'menu_name'                  => __( 'Core & Research Services', 'foundationpress' ),
	);

	register_taxonomy(
		UTH_SERVICE_NEWS_TAXONOMY,
		array( 'post' ),
		array(
			'labels'            => $labels,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'core-research-service' ),
		)
	);
}
add_action( 'init', 'uth_register_service_news_taxonomy' );

/**
 * Determine whether the current page belongs to the Core & Research Services tree.
 *
 * @param int|WP_Post $post Page ID or object.
 * @return bool
 */
function uth_is_core_research_service_page( $post ) {
	$post = get_post( $post );

	if ( ! $post || 'page' !== $post->post_type ) {
		return false;
	}

	if ( 'services' === $post->post_name ) {
		return true;
	}

	$services_page = get_page_by_path( 'services' );

	if ( ! $services_page ) {
		return false;
	}

	return in_array( (int) $services_page->ID, get_post_ancestors( $post ), true );
}

/**
 * Create or update the matching service taxonomy term when a service page is saved.
 *
 * @param int     $post_id Saved post ID.
 * @param WP_Post $post Saved post object.
 */
function uth_sync_service_page_taxonomy_term( $post_id, $post ) {
	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) || ! uth_is_core_research_service_page( $post ) ) {
		return;
	}

	$term = get_term_by( 'slug', $post->post_name, UTH_SERVICE_NEWS_TAXONOMY );

	if ( $term ) {
		if ( $term->name !== $post->post_title ) {
			wp_update_term( $term->term_id, UTH_SERVICE_NEWS_TAXONOMY, array( 'name' => $post->post_title ) );
		}

		return;
	}

	wp_insert_term( $post->post_title, UTH_SERVICE_NEWS_TAXONOMY, array( 'slug' => $post->post_name ) );
}
add_action( 'save_post_page', 'uth_sync_service_page_taxonomy_term', 10, 2 );

/**
 * Keep terms available for existing service pages in the post editor.
 */
function uth_sync_all_service_page_taxonomy_terms() {
	if ( ! is_admin() || get_transient( 'uth_service_news_terms_synced' ) ) {
		return;
	}

	$services_page = get_page_by_path( 'services' );

	if ( ! $services_page ) {
		return;
	}

	$service_pages   = get_pages( array( 'child_of' => $services_page->ID ) );
	$service_pages[] = $services_page;

	foreach ( $service_pages as $service_page ) {
		uth_sync_service_page_taxonomy_term( $service_page->ID, $service_page );
	}

	set_transient( 'uth_service_news_terms_synced', 1, HOUR_IN_SECONDS );
}
add_action( 'admin_init', 'uth_sync_all_service_page_taxonomy_terms' );

/**
 * Render the service-specific news feed for the current page.
 */
function uth_render_core_research_service_news_feed() {
	static $has_rendered = false;

	if ( $has_rendered ) {
		return;
	}

	if ( ! is_page() || ! uth_is_core_research_service_page( get_the_ID() ) ) {
		return;
	}

	$term = get_term_by( 'slug', get_post_field( 'post_name', get_the_ID() ), UTH_SERVICE_NEWS_TAXONOMY );

	if ( ! $term || is_wp_error( $term ) ) {
		return;
	}

	$service_news = new WP_Query(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
			'tax_query'           => array(
				array(
					'taxonomy' => UTH_SERVICE_NEWS_TAXONOMY,
					'field'    => 'term_id',
					'terms'    => $term->term_id,
				),
			),
		)
	);

	if ( ! $service_news->have_posts() ) {
		wp_reset_postdata();
		return;
	}

	$has_rendered = true;
	?>
	<section class="bleed beige close core-research-service-news">
		<div class="grid-container">
			<h2 class="h3">Featured News</h2>
			<div class="grid-x grid-margin-x">
				<?php
				while ( $service_news->have_posts() ) :
					$service_news->the_post();
					$external_link = get_post_meta( get_the_ID(), 'ut_news_external_link', true );
					$legacy_link   = get_post_meta( get_the_ID(), 'external-link-url-post', true );
					$news_url      = ! empty( $external_link ) ? $external_link : $legacy_link;
					$news_url      = ! empty( $news_url ) ? $news_url : get_permalink();
					?>
					<article class="cell small-12 medium-4">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php echo esc_url( $news_url ); ?>">
								<?php the_post_thumbnail( 'medium' ); ?>
							</a>
						<?php endif; ?>
						<a href="<?php echo esc_url( $news_url ); ?>">
							<h3 class="h5 close"><?php the_title(); ?></h3>
						</a>
						<strong><p><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></p></strong>
						<?php the_excerpt(); ?>
					</article>
					<?php
				endwhile;
				?>
			</div>
			<p><a class="button" href="<?php echo esc_url( get_term_link( $term ) ); ?>">All news</a></p>
		</div>
	</section>
	<?php
	wp_reset_postdata();
}

/**
 * Shortcode for manual placement on a service page, if needed.
 *
 * @return string
 */
function uth_core_research_service_news_shortcode() {
	ob_start();
	uth_render_core_research_service_news_feed();
	return ob_get_clean();
}
add_shortcode( 'core_research_service_news', 'uth_core_research_service_news_shortcode' );
