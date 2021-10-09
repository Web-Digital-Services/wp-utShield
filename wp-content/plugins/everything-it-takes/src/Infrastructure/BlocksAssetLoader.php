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

final class BlocksAssetLoader implements Registerable {

	public function register(): void {
//		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_fonts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_fonts' ] );

//		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );

//		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	function enqueue_fonts() {
		wp_enqueue_style( 'eit-blocks-google-fonts', '//fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap' );
	}

	function enqueue_styles() {
		wp_enqueue_style(
			'eit-blocks-foundation',
			'//cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css',
			[],
		);

		wp_enqueue_style(
			'eit-blocks',
			get_stylesheet_directory_uri() . '/static/assets/css/style.css',
			[ 'eit-blocks-google-fonts', 'eit-blocks-foundation' ],
			filemtime( get_stylesheet_directory() . '/static/assets/css/style.css' ),
		);
	}

	function enqueue_scripts() {
		wp_enqueue_script(
			'eit-blocks-vendor',
			get_stylesheet_directory_uri() . '/static/assets/js/vendor.js',
			[ 'jquery' ],
			filemtime( get_stylesheet_directory() . '/static/assets/js/vendor.js' ),
			true
		);

		wp_enqueue_script(
			'eit-blocks-foundation',
			'//cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js',
			[ 'jquery', 'eit-blocks-vendor' ],
			'6.6.3',
			true
		);

		wp_enqueue_script(
			'eit-blocks-site',
			get_stylesheet_directory_uri() . '/static/assets/js/main.js',
			[ 'jquery', 'eit-blocks-vendor', 'eit-blocks-foundation' ],
			filemtime( get_stylesheet_directory() . '/static/assets/js/main.js' ),
			true
		);
	}
}
