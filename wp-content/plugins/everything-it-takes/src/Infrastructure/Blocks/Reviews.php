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

namespace EverythingItTakes\Plugin\Infrastructure\Blocks;

use EverythingItTakes\Plugin\Domain\ReviewRepository;
use EverythingItTakes\Plugin\Infrastructure\ACFBlock;
use EverythingItTakes\Plugin\Infrastructure\PostTypes\ReviewPostType;

final class Reviews extends ACFBlock {

	protected function get_slug(): string {
		return 'nd_reviews';
	}

	protected function get_title(): string {
		return 'Reviews';
	}

	public function get_args(): array {
		$args = parent::get_args();

		$post_ids = get_field( 'post_ids' ) ?: [];

		$args['reviews'] = ( new ReviewRepository() )->find_by_post_ids( $post_ids );

		return $args;
	}

	public function get_fields(): array {
		return [
			[
				'key'   => 'title',
				'label' => 'Title',
				'type'  => 'text',
			],
			array(
				'key'       => 'post_ids',
				'label'     => 'Testimonials',
				'type'      => 'post_object',
				'post_type' => array(
					0 => ReviewPostType::SLUG,
				),
				'multiple'  => 1,
			),
		];
	}

}
