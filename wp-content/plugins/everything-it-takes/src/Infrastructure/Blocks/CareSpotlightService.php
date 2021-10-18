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

use EverythingItTakes\Plugin\Application\BlockRandomizer;
use EverythingItTakes\Plugin\Infrastructure\ACFBlock;

final class CareSpotlightService extends ACFBlock {

	public function get_slug(): string {
		return 'nd_care_spotlight_service';
	}

	public function get_title(): string {
		return 'Care Spotlight (Service)';
	}

	public function get_args(): array {
		$args = parent::get_args();

		$args['is_random'] = BlockRandomizer::is_block_random();

		return $args;
	}

	public function get_fields(): array {
		return [
			[
				'key'   => 'title_left',
				'label' => 'Title (Left)',
				'type'  => 'textarea',
				'rows'  => 2,
			],
			[
				'key'   => 'image_id_1',
				'label' => 'Image #1',
				'type'  => 'image',
				'width' => 50,
			],
			[
				'key'   => 'image_id_2',
				'label' => 'Image #2',
				'type'  => 'image',
				'width' => 50,
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
				'rows'  => 2
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
		];
	}

}
