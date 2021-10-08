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

use EverythingItTakes\Plugin\Infrastructure\ACFBlock;
use EverythingItTakes\Plugin\Infrastructure\Blocks;
use EverythingItTakes\Plugin\Infrastructure\PostType\Review;

final class Reviews extends ACFBlock {

	const SLUG = 'nd_reviews';
	const TITLE = 'Reviews';

	protected function get_slug(): string {
		return self::SLUG;
	}

	protected function get_title(): string {
		return self::TITLE;
	}

	public function register_block(): void {
		acf_register_block_type( array(
			'title'           => self::TITLE,
			'name'            => self::SLUG,
			'category'        => Blocks::CATEGORY,
			'icon'            => Blocks::ICON,
			'render_callback' => [ $this, 'render' ],
			'mode'            => 'auto',
			'supports'        => [
				'align'           => false,
				'anchor'          => true,
				'customClassName' => true,
				'jsx'             => true,
				'mode'            => false, // Disable switch to 'edit' mode.
			]
		) );
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
					0 => Review::SLUG,
				),
				'multiple'  => 1,
			),
		];
	}

	public function register_fields(): void {
		$this->register_field_group( self::SLUG, self::TITLE, $this->get_fields() );
	}

}
