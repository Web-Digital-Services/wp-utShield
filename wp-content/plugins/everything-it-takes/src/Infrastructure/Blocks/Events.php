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

use EverythingItTakes\Plugin\Domain\Event;
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

		$args['events'] = $this->get_events();

//		\Kint::dump( $args['events'] );
//		die();

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

	private function get_events(): array {
		$events_data = json_decode( file_get_contents( 'https://news.uthscsa.edu/wp-json/wp/v2/events' ) );

		$event_count = 0;
		$events      = [];

		foreach ( $events_data as $event ) {
			if ( ! is_a( $event, 'stdClass' ) ) {
				continue;
			}

			$events[] = new Event( $event );
			$event_count ++;

			if ( 3 === $event_count ) {
				return $events;
			}
		}

		return $events_data;
	}

}
