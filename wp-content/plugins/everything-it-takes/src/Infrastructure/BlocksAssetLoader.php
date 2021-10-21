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
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_fonts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_fonts() {
		if ( ! $this->is_eit_style() ) {
			return;
		}

		wp_enqueue_style( 'eit-blocks-google-fonts', '//fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap' );
	}

	public function enqueue_styles() {
		if ( ! $this->is_eit_style() ) {
			return;
		}

		if ( is_page_template( 'page-templates/blocks.php' ) ) {
			wp_enqueue_style(
				'eit-blocks-foundation',
				'//cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css',
				[],
			);
		}

		wp_enqueue_style(
			'eit-blocks',
			get_stylesheet_directory_uri() . '/static/assets/css/style.css',
			$this->get_style_dependencies(),
			filemtime( get_stylesheet_directory() . '/static/assets/css/style.css' ),
		);
	}

	private function get_style_dependencies(): array {
		return is_page_template( 'page-templates/blocks.php' )
			? [ 'eit-blocks-foundation', 'eit-blocks-google-fonts' ]
			: [ 'main-stylesheet', 'eit-blocks-google-fonts' ];
	}

	public function enqueue_scripts() {
		if ( ! $this->is_eit_style() ) {
			return;
		}

		wp_enqueue_script(
			'eit-blocks-vendor',
			get_stylesheet_directory_uri() . '/static/assets/js/vendor.js',
			[ 'jquery' ],
			filemtime( get_stylesheet_directory() . '/static/assets/js/vendor.js' ),
			true
		);

		if ( is_page_template( 'page-templates/blocks.php' ) ) {
			wp_enqueue_script(
				'eit-blocks-foundation',
				'//cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js',
				[ 'jquery', 'eit-blocks-vendor' ],
				'6.6.3',
				true
			);
		}

		wp_enqueue_script(
			'eit-blocks-site',
			get_stylesheet_directory_uri() . '/static/assets/js/main.js',
			$this->get_script_dependencies(),
			filemtime( get_stylesheet_directory() . '/static/assets/js/main.js' ),
			true
		);
	}

	private function get_script_dependencies(): array {
		return is_page_template( 'page-templates/blocks.php' )
			? [ 'jquery', 'eit-blocks-vendor', 'eit-blocks-foundation' ]
			: [ 'jquery', 'foundation', 'eit-blocks-vendor' ];
	}

	private function is_eit_style(): bool {
		return
			! is_page_template( 'page-templates/blocks.php' )
			|| $this->is_ten_adams_theme_mod();
	}

	private function is_ten_adams_theme_mod(): bool {
		return 'tenadams' === get_theme_mod( 'wp_shield_theme_switch_control' );
	}
}
