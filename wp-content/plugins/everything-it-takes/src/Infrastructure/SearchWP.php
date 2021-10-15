<?php

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

}
