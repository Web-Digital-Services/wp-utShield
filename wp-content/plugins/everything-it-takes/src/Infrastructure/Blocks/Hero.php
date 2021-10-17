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

class Hero extends ACFBlock {

	public function get_slug(): string {
		return 'nd_hero';
	}

	public function get_title(): string {
		return 'Hero';
	}

	public function get_fields(): array {
		return [
			[
				'key'   => 'eyebrow',
				'label' => 'Eyebrow',
				'type'  => 'text'
			],
//			[
//				'key'   => 'title',
//				'label' => 'Title',
//				'type'  => 'textarea',
//				'rows'  => 2
//			],
			[
				'key'   => 'text',
				'label' => 'Text',
				'type'  => 'textarea'
			],
			[
				'key'   => 'image_id',
				'label' => 'Image',
				'type'  => 'image',
			],
			[
				'key'   => 'cta_text',
				'label' => 'CTA Text',
				'type'  => 'text',
			],
		];
	}

}
