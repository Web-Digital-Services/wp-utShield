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

final class FeaturedCTABasic extends ACFBlock {

	public function get_slug(): string {
		return 'nd_featured_cta_basic';
	}

	public function get_title(): string {
		return 'Featured CTA (Basic)';
	}

	public function get_fields(): array {
		return [
			[
				'key'   => 'text',
				'label' => 'Text',
				'type'  => 'wysiwyg',
				'width' => 75
			],
			[
				'key'   => 'cta',
				'label' => 'CTA',
				'type'  => 'link',
				'width' => 25
			],
		];
	}

}
