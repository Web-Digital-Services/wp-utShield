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

final class MarqueeText extends ACFBlock {

	public function get_slug(): string {
		return 'nd_marquee_text';
	}

	public function get_title(): string {
		return 'Marquee Text';
	}

	public function get_fields(): array {
		return [
			[
				'key'   => 'text',
				'label' => 'Text',
				'type'  => 'text'
			],
		];
	}

}
