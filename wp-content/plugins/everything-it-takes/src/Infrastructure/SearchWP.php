<?php declare( strict_types=1 );

/**
 * EverythingItTakes.com Plugin.
 *
 * @package   EverythingItTakes\Plugin
 * @author    Ten Adams <digital@tenadams.com>
 * @license   MIT
 * @link      https://tenadams.com/
 * @copyright 2021 Ten Adams
 */

namespace EverythingItTakes\Plugin\Infrastructure;

use EverythingItTakes\Plugin\Registerable;

final class SearchWP implements Registerable {

	public function register(): void {
		add_filter( 'searchwp_live_search_get_search_form_engine', [ $this, 'set_live_search_engine' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'remove_live_search_css_except_positioning' ], 20 );

		/**
		 * Disables positioning styles of SearchWP Live Ajax Search results.
		 *
		 * Not needed because we are putting the results inside the #menu__foot
		 * element via the data attribute on the form input for it.
		 *
		 * @url https://searchwp.com/extensions/live-search/
		 */
		add_filter( 'searchwp_live_search_base_styles', '__return_false' );

		/**
		 * Enables matching any word in terms.
		 *
		 * @url https://searchwp.com/extensions/term-archive-priority/
		 */
		add_filter( 'searchwp_tax_term_or_logic', '__return_true' );

		/**
		 * Enable partial and fuzzy matches.
		 *
		 * @url https://searchwp.com/documentation/hooks/searchwp-query-partial_matches/
		 */
		add_filter( 'searchwp\query\partial_matches', '__return_true' );

		/**
		 * Enable debugging (because Advanced tab shows nothing on live site, so
		 * can't turn on).
		 *
		 * @url https://searchwp.com/documentation/hooks/searchwp-debug/
		 */
		add_filter( 'searchwp\debug', '__return_true' );

		add_filter( 'searchwp\swp_query\args', [ $this, 'short_circuit_ajax_engine' ] );
		add_filter( 'searchwp_term_archive_enabled', [ $this, 'enable_term_archives_in_results' ], 10, 2 );

		/**
		 * Elio from SearchWP support suggested adding on 19 Oct 2021 to prevent
		 * providers / locations, showing for taxonomy search terms, but posts still
		 * showing currently.
		 *
		 * '[T]o prevent the posts to be found by the taxonomy terms, you can use this
		 * code to prevent the indexing of the taxonomy terms data'.
		 *
		 * NB. You must re-index SearchWP after applying this change.
		 */
		add_filter( 'searchwp\source\post\attributes\taxonomy\term', function ( $term_data ) {
			return [];
		} );

		/**
		 * Enable regex pattern match tokenization in SearchWP.
		 *
		 * Added here, because Advanced tab not showing on live site.
		 *
		 * @url https://searchwp.com/documentation/hooks/searchwp-tokens-tokenize_pattern_matches/
		 */
		add_filter( 'searchwp\tokens\tokenize_pattern_matches', '__return_true' );

		add_filter( 'searchwp_term_archive_term_args', function ( $args ) {
			do_action( 'searchwp\debug\log', 'Term Archive args: ' . print_r( $args, true ), 'Ticket 1462719' );

			return $args;
		} );
	}

	/**
	 * Defines the supplemental search engine to be used by the SearchWP Live Ajax
	 * Search plugin.
	 *
	 * @url https://searchwp.com/extensions/live-search/
	 *
	 * @return string
	 */
	public function set_live_search_engine(): string {
		return 'modal';
	}

	public function remove_live_search_css_except_positioning() {
		wp_dequeue_style( 'searchwp-live-search' );
	}

	/**
	 * Elio from SearchWP support suggested adding on 19 Oct 2021 to fix term
	 * archives not showing on SearchWP live search results.
	 *
	 * @url https://gist.github.com/BrElio/00e8f9f9dbbd373d6763ab86322df89e#file-swp_11902-php-L4-L17
	 *
	 * @param $args
	 * @return mixed
	 */
	public function short_circuit_ajax_engine( $args ) {
		if ( wp_doing_ajax() ) {
			// Short circuit.
			$args['engine'] = '';
		}

		return $args;
	}

	/**
	 * Elio from SearchWP support suggested adding on 19 Oct 2021 to fix term
	 * archives not showing on SearchWP live search results.
	 *
	 * @url https://gist.github.com/BrElio/00e8f9f9dbbd373d6763ab86322df89e#file-swp_11902-php-L4-L17
	 *
	 * @param $enabled
	 * @param $engine
	 * @return bool|mixed
	 */
	public function enable_term_archives_in_results( $enabled, $engine ) {
		if ( isset( $_REQUEST['action'] ) && 'searchwp_live_search' == $_REQUEST['action'] ) {
			$enabled = true;
		}

		return $enabled;
	}

}
