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

final class CareSpotlightProvider extends ACFBlock {

	public function get_slug(): string {
		return 'nd_care_spotlight_provider';
	}

	public function get_title(): string {
		return 'Care Spotlight (Provider)';
	}

	public function get_fields(): array {
		return [
			[
				[
					'key'   => 'title_left',
					'label' => 'Title (Left)',
					'type'  => 'textarea',
					'rows'  => 2,
				],
				[
					'key'   => 'image_id',
					'label' => 'Image',
					'type'  => 'image',
				],
				[
					'key'   => 'eyebrow',
					'label' => 'Eyebrow',
					'type'  => 'text'
				],
				[
					'key'   => 'title',
					'label' => 'Title',
					'type'  => 'textarea',
					'rows'  => 2,
				],
				[
					'key'   => 'text',
					'label' => 'Text',
					'type'  => 'textarea'
				],
				[
					'key'   => 'cta_1',
					'label' => 'CTA #1',
					'type'  => 'link',
					'width' => 50,
				],
				[
					'key'   => 'cta_2',
					'label' => 'CTA #2',
					'type'  => 'link',
					'width' => 50,
				],
			]
		];
	}

}
