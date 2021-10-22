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

final class BodyClasses implements Registerable {

	public function register(): void {
		add_filter( 'body_class', [ $this, 'add_non_blocks_body_class' ] );
	}

	public function add_non_blocks_body_class( array $classes ): array {
		if ( is_page_template( 'page-templates/blocks.php' ) ) {
			return $classes;
		}

		$classes[] = 'eit-non-blocks';

		return $classes;
	}

}
