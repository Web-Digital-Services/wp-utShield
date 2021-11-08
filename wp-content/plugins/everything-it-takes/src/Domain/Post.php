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

use stdClass;

final class Post {

	private stdClass $post;
	private string $image_url;
	private string $image_alt;

	public function __construct( stdClass $post, string $image_url = '', string $image_alt = '' ) {
		$this->post      = $post;
		$this->image_url = $image_url;
		$this->image_alt = $image_alt;
	}

	public function get_date(): string {
		return date( "F j, Y", strtotime( $this->post->date ) );
	}

	public function get_featured_image(): string {
		return $this->image_url ?: get_stylesheet_directory_uri() . '/static/assets/_src/img/placeholder-news.jpg';
	}

	public function get_featured_image_alt(): string {
		return $this->image_alt ?: 'UT Health shield logo';
	}

	public function get_title(): string {
		return $this->post->title->rendered ?: '';
	}

	public function get_url(): string {
		return $this->post->link;
	}

}
