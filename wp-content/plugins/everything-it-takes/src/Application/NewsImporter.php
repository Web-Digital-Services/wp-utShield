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

namespace EverythingItTakes\Plugin\Application;

use EverythingItTakes\Plugin\Domain\Post;
use stdClass;

final class NewsImporter {

	public static function get(): array {
		return self::get_final_data( self::get_raw_data() );
	}

	private static function get_final_data( array $posts_data ): array {
		$transient = get_transient( 'nd_news_importer_get_final_data' );

		if ( false !== $transient ) {
			return $transient;
		}

		$post_count = 0;
		$posts      = [];

		foreach ( $posts_data as $post ) {
			if ( ! is_a( $post, 'stdClass' ) ) {
				continue;
			}

			/**
			 * Option 1: Skip posts without featured image.
			 */
			if ( ! isset( $post->featured_media ) || 0 === $post->featured_media ) {
				continue;
			}

			$image_object = self::get_featured_image( $post->featured_media );

			if ( 'application/pdf' === $image_object->mime_type ) {
				continue;
			}

			$image_url = '';

			if ( null !== $image_object ) {

				if ( isset( $image_object->media_details->sizes->croppedLarge->source_url ) ) {
					$image_url = $image_object->media_details->sizes->croppedLarge->source_url;
//				} elseif ( isset( $image_object->media_details->sizes->large->source_url ) ) {
//					$image_url = $image_object->media_details->sizes->large->source_url;
				}
			}

			if ( empty( $image_url ) ) {
				continue;
			}

			$image_alt = $image_object->alt_text ?: '';

			/**
			 * Option 2: Include posts without featured image.
			 * TODO: Use a fallback image instead.
			 */
//			if ( isset( $post->featured_media ) && 0 !== $post->featured_media ) {
//				$image_object = self::get_featured_image( $post->featured_media );
//
//				$image_url = null !== $image_object ? $image_object->source_url : '';
//			} else {
//				$image_url = '';
//			}

			$posts[] = new Post( $post, $image_url, $image_alt );
		}

		$final_posts = [];

		foreach ( $posts as $post ) {
			$post_count ++;

			$final_posts[] = $post;

			if ( 4 === $post_count ) {
				set_transient( 'nd_news_importer_get_final_data', $final_posts, DAY_IN_SECONDS );

				return $final_posts;
			}
		}

		return $final_posts;
	}

	/**
	 * @url https://news.uthscsa.edu/category/main/health/
	 * @return array
	 */
	private static function get_raw_data(): array {
		return json_decode( file_get_contents( 'https://news.uthscsa.edu/wp-json/wp/v2/posts?per_page=20&categories=2' ) );
	}

	private static function get_featured_image( int $image_id ): ?stdClass {
		$data = file_get_contents( 'https://news.uthscsa.edu/wp-json/wp/v2/media/' . $image_id );

		if ( false === $data ) {
			return null;
		}

		return json_decode( $data );
	}

}
