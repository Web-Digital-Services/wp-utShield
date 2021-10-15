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

use EverythingItTakes\Plugin\Application\EventImporter;
use EverythingItTakes\Plugin\Infrastructure\ACFBlock;

final class Events extends ACFBlock {

	public function get_slug(): string {
		return 'nd_events';
	}

	public function get_title(): string {
		return 'Events';
	}

	public function get_args(): array {
		$args = parent::get_args();

		if ( ! is_admin() ) {
			$args['events'] = EventImporter::get();

			\Kint::dump( $args['events'] );
			die();
		}

		return $args;
	}

	public function get_fields(): array {
		return [
			[
				'key'   => 'eyebrow',
				'label' => 'Eyebrow',
				'type'  => 'text'
			],
			[
				'key'   => 'title',
				'label' => 'Title',
				'type'  => 'textarea'
			],
			[
				'key'   => 'text',
				'label' => 'Text',
				'type'  => 'textarea'
			],
			[
				'key'   => 'cta',
				'label' => 'CTA',
				'type'  => 'link',
			],
		];
	}

}
