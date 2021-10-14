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

final class FullWidthImage extends ACFBlock {

	public function get_slug(): string {
		return 'nd_full_width_image';
	}

	public function get_title(): string {
		return 'Full Width Image';
	}

	public function get_fields(): array {
		return [
			[
				'key'   => 'image_id',
				'label' => 'Image',
				'type'  => 'image'
			],
		];
	}

}
