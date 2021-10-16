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
		return json_decode( file_get_contents( 'https://news.uthscsa.edu/wp-json/wp/v2/events?per_page=100' ) );
	}

	private static function filter_events( array $events_data ): array {
		$event_count = 0;
		$events      = [];

		foreach ( $events_data as $event ) {
			if ( ! is_a( $event, 'stdClass' ) ) {
				continue;
			}

			$events[] = new Event( $event );
		}

		$current_events = [];

		foreach ( $events as $event ) {
			// Get today's date in YYYY-mm-dd
			if ( $event->get_date() < date( "Y-m-d" ) ) {
				continue;
			}

			// Only keep ones with the same or greater
			$current_events[] = $event;
		}

		usort( $current_events, fn( $a, $b ) => strcmp( $a->get_date(), $b->get_date() ) );

		$final_events = [];

		foreach ( $current_events as $event ) {
			$event_count ++;

			$final_events[] = $event;

			if ( 3 === $event_count ) {
				return $final_events;
			}
		}

		return $final_events;
	}

}
