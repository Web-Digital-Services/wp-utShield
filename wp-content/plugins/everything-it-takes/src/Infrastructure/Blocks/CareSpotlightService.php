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

final class CareSpotlightService extends ACFBlock {

	public function get_slug(): string {
		return 'nd_care_spotlight_service';
	}

	public function get_title(): string {
		return 'Care Spotlight (Service)';
	}

}
