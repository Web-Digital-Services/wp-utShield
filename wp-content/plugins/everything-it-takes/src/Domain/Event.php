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

namespace EverythingItTakes\Plugin\Domain;

use stdClass;

final class Event {

	private stdClass $event;

	public function __construct( stdClass $event ) {
		$this->event = $event;
	}

	public function get_month(): string {
		if ( empty( $this->get_date() ) ) {
			return '';
		}

		return date( "M", strtotime( $this->get_date() ) );
	}

	public function get_day(): string {
		if ( empty( $this->get_date() ) ) {
			return '';
		}

		return date( "j", strtotime( $this->get_date() ) );
	}

	private function get_date(): string {
		return $this->event->{'event-alt-date'} ?: '';
	}

	public function get_title(): string {
		return $this->event->title->rendered ?: '';
	}

	public function get_url(): string {
		return $this->event->link;
	}

}
