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

use EverythingItTakes\Plugin\Infrastructure\PostTypes\ReviewPostType;
use WP_Query;

final class ReviewRepository implements Repository {

	/**
	 * Find a single element by its ID.
	 *
	 * @param int $id ID of the element to find.
	 * @return ReviewPostType
	 */
	public function find( int $id ): ?ReviewPostType {
		return new ReviewPostType( get_post( $id ) );
	}

	/**
	 * Find the collection of all elements the repository contains.
	 *
	 * @return ReviewCollection
	 */
	public function find_all(): ReviewCollection {
		// TODO: Implement find_all() method.
	}

	/**
	 * Find a collection of elements that fit a given set of criteria.
	 *
	 * @param array $args Arguments to query by.
	 * @return ReviewCollection
	 */
	public function find_by( array $args ): ReviewCollection {
		$default_args = [
			'post_type'              => ReviewPostType::SLUG,
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false
		];

		$args  = array_merge( $default_args, $args );
		$query = new WP_Query( $args );

		return ReviewCollection::from_wp_post_array( $query->posts );
	}

	/**
	 * Find a single element that fits a given set of criteria.
	 *
	 * @param array $args Arguments to query by.
	 * @return ReviewPostType
	 */
	public function find_one_by( array $args ): ?ReviewPostType {
		// TODO: Implement find_one_by() method.
	}

	public function find_by_post_ids( array $post_ids ): ReviewCollection {
		$args = [
			'post__in' => $post_ids,
			'orderby'  => 'post__in'
		];

		return $this->find_by( $args );
	}

	public function find_latest( int $count = 1 ): ReviewCollection {
		$args = [ 'posts_per_page' => $count ];

		return $this->find_by( $args );
	}
}
