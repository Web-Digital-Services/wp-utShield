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

namespace EverythingItTakes\Plugin\Application;

use EverythingItTakes\Plugin\Domain\Event;

final class EventImporter {

	public static function get(): array {
		return self::filter_events( self::get_raw_data() );
	}

	private static function get_raw_data(): array {
		return json_decode( file_get_contents( 'https://news.uthscsa.edu/wp-json/wp/v2/events' ) );
	}

	private static function filter_events( array $events_data ): array {
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

		return [];
	}

}
