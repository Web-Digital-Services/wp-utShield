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

abstract class WPPost {

	/**
	 * @var WP_Post
	 */
	protected $post;

	public function __construct( WP_Post $post ) {
		$this->post = $post;
	}

	public function get_id(): int {
		return $this->post->ID;
	}

	public function get_title(): string {
		return $this->post->post_title;
	}

	public function get_excerpt(): string {
		return $this->post->post_excerpt;
	}

	public function get_content(): string {
		return $this->post->post_content;
	}

	public function get_featured_image( string $image_size ): string {
		return get_the_post_thumbnail( $this->post->ID, $image_size );
	}

	public function has_featured_image(): bool {
		return has_post_thumbnail( $this->post->ID );
	}

	public function get_template(): string {
		return $this->post->page_template;
	}

	public function get_type(): string {
		return $this->post->post_type;
	}

	public function get_url(): string {
		return get_permalink( $this->get_id() );
	}

}
