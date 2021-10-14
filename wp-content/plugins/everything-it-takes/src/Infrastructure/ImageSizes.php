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

namespace EverythingItTakes\Plugin\Infrastructure;

use EverythingItTakes\Plugin\Registerable;

final class ImageSizes implements Registerable {

	public function register(): void {
		add_action( 'after_setup_theme', [ $this, 'add_image_sizes' ] );
	}

	public function add_image_sizes() {
		add_image_size( 'eit-care-spotlight', 768, 880, true );
		add_image_size( 'eit-featured-cta-small', 332, 456, true );
		add_image_size( 'eit-featured-cta-small', 332, 456, true );
		add_image_size( 'eit-featured-cta-large', 1000, 1532, true );
		add_image_size( 'eit-provider-icon', 44, 44, true );
	}
}
