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

namespace EverythingItTakes\Plugin\Domain;

use EverythingItTakes\Plugin\Infrastructure\Taxonomy\ReviewRatingTaxonomy;

final class Review extends Post {

	public function get_source(): string {
		return 'google';

//		$terms = get_the_terms( $this->get_id(), ReviewSourceTaxonomy::SLUG );
//
//		if ( ! is_array( $terms ) ) {
//			return '';
//		}
//
//		return $terms[0]->slug;
	}

	public function get_star_count(): int {
		$terms = get_the_terms( $this->get_id(), ReviewRatingTaxonomy::SLUG );

		if ( ! is_array( $terms ) ) {
			return 0;
		}

		return (int) $terms[0]->slug;
	}

}
