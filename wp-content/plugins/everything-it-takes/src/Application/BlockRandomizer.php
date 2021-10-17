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

use EverythingItTakes\Plugin\Registerable;

final class BlockRandomizer implements Registerable {

	public function register(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_script' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_style' ] );
	}

	public function enqueue_style() {
		if ( ! is_page_template( 'page-templates/blocks.php' ) ) {
			return;
		}

		$css_path    = 'css/block-randomizer.css';
		$css_url     = EIT_PLUGIN_URL . '/' . $css_path;
		$css_version = filemtime( EIT_PLUGIN_DIR . $css_path );

		wp_enqueue_style( 'nd-block-randomizer', $css_url, [], $css_version );
	}

	public function enqueue_script() {
		if ( ! is_page_template( 'page-templates/blocks.php' ) ) {
			return;
		}

		$js_path    = 'js/block-randomizer.js';
		$js_url     = EIT_PLUGIN_URL . '/' . $js_path;
		$js_version = filemtime( EIT_PLUGIN_DIR . $js_path );

		wp_enqueue_script( 'nd-block-randomizer', $js_url, [ 'jquery' ], $js_version, true );
	}

}
