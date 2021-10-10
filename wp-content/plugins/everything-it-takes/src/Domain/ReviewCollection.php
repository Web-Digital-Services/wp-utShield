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

use WP_Post;

final class ReviewCollection extends ArrayCollection {

	public static function from_wp_post_array( array $posts ): self {
		$reviews = array_map( __CLASS__ . '::wp_post_to_review', $posts );

		return new self( $reviews );
	}

	private static function wp_post_to_review( WP_Post $post ) {
		return new Review( $post );
	}

}
