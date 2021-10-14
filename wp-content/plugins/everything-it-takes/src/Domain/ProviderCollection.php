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

final class ProviderCollection extends ArrayCollection {

	public static function from_wp_post_array( array $posts ): self {
		$providers = array_map( __CLASS__ . '::wp_post_to_provider', $posts );

		return new self( $providers );
	}

	private static function wp_post_to_provider( WP_Post $post ) {
		return new Provider( $post );
	}

}
