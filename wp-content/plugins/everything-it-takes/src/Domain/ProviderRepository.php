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

use EverythingItTakes\Plugin\Infrastructure\PostTypes\ProviderPostType;
use WP_Query;

final class ProviderRepository implements Repository {

	/**
	 * Find a single element by its ID.
	 *
	 * @param int $id ID of the element to find.
	 * @return Provider
	 */
	public function find( int $id ): ?Provider {
		return new Provider( get_post( $id ) );
	}

	/**
	 * Find the collection of all elements the repository contains.
	 *
	 * @return ProviderCollection
	 */
	public function find_all(): ProviderCollection {
		return $this->find_by( [ 'posts_per_page' => 2500 ] );
	}

	/**
	 * Find a collection of elements that fit a given set of criteria.
	 *
	 * @param array $args Arguments to query by.
	 * @return ProviderCollection
	 */
	public function find_by( array $args ): ProviderCollection {
		$default_args = [
			'post_type'              => ProviderPostType::SLUG,
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			"meta_query"             => [
				"relation"   => "AND",
				"first_name" => [
					"key"     => ProviderPostType::FIRST_NAME_KEY,
					"compare" => "EXISTS",
				],
				"last_name"  => [
					"key"     => ProviderPostType::LAST_NAME_KEY,
					"compare" => "EXISTS",
				],
			],
			"orderby"                => [
				"last_name"  => "ASC",
				"first_name" => "ASC"
			],
		];

		$args  = array_merge( $default_args, $args );
		$query = new WP_Query( $args );

		return ProviderCollection::from_wp_post_array( $query->posts );
	}

	/**
	 * Find a single element that fits a given set of criteria.
	 *
	 * @param array $args Arguments to query by.
	 * @return Provider
	 */
	public function find_one_by( array $args ): ?Provider {
		// TODO: Implement find_one_by() method.
	}

}
