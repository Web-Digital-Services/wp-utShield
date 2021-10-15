<?php
/**
 * Search results are contained within a div.searchwp-live-search-results
 * which you can style accordingly as you would any other element on your site
 *
 * Some base styles are output in wp_footer that do nothing but position the
 * results container and apply a default transition, you can disable that by
 * adding the following to your theme's functions.php:
 *
 * add_filter( 'searchwp_live_search_base_styles', '__return_false' );
 *
 * There is a separate stylesheet that is also enqueued that applies the default
 * results theme (the visual styles) but you can disable that too by adding
 * the following to your theme's functions.php:
 *
 * wp_dequeue_style( 'searchwp-live-search' );
 *
 * You can use ~/searchwp-live-search/assets/styles/style.css as a guide to customize
 */

use EverythingItTakes\Plugin\Domain\Provider;
use EverythingItTakes\Plugin\Domain\Location;
use EverythingItTakes\Plugin\Infrastructure\PostTypes\LocationPostType;
use EverythingItTakes\Plugin\Infrastructure\PostTypes\ProviderPostType;

$highlighter = new SearchWP\Highlighter();
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
$query       = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';
$search_page = isset( $_GET['swppg'] ) ? absint( $_GET['swppg'] ) : 1;

$search_results = [];

$searchwp_query = new \SearchWP\Query( $query, [
	'engine'    => 'modal', // The Engine name.
	'fields'    => 'all', // Load proper native objects of each result.
	'page'      => $search_page,
	'parent_el' => '.menu__foot',
] );

$search_results = $searchwp_query->get_results();
?>

<div class="menu__searchwp">
	<div class="menu__list">
		<ul class="list-persons list-persons--alt">
			<?php if ( ! empty( $search_results ) ) : ?>

				<?php foreach ( $search_results as $search_result ) : ?>
					<li class="searchwp-live-search-result" role="option" id="" aria-selected="false">
						<?php switch ( get_class( $search_result ) ) :
							case 'WP_Post': ?>
								<?php
								if ( ProviderPostType::SLUG === $search_result->post_type ) {
									$post = ( new Provider( $search_result ) );
									?>
									<a href="<?= esc_url( $post->get_url() ); ?>" class="person person--alt" target="_blank">
										<figure><?= wp_kses_post( $post->get_featured_image() ); ?></figure>
										<p><?= esc_html( $post->get_title() ); ?> <span>in Physicians</span></p>
									</a>
									<?php
								} elseif ( LocationPostType::SLUG === $search_result->post_type ) {
									$post = ( new Location( $search_result ) );
									?>
									<a href="<?= esc_url( get_site_url() . '/provider-directory?_p=' . $post->get_id() ); ?>"
										 class="person"
										 target="_blank">
										<p><?= esc_html( $post->get_title() ); ?> <span>in Locations</span></p>
									</a>
									<?php
								}
								wp_reset_postdata();
								break;
							case 'SearchWPTermResult': ?>
								<a href="<?php echo $search_result->link; ?>" class="person person--alt" target="_blank">
									<p><?php echo $search_result->name; ?> in <span><?php echo $search_result->taxonomy; ?></span></p>
								</a>
								<?php break; ?>
							<?php endswitch; ?>
					</li>
				<?php endforeach; ?>

			<?php else : ?>
				<li class="searchwp-live-search-no-results" role="option" class="person person--alt">
					<p><?php esc_html_e( 'No results found.', 'searchwp-live-ajax-search' ); ?></p>
				</li>
			<?php endif; ?>

		</ul><!-- /.list-persons -->
	</div><!-- /.menu__list -->
</div>
