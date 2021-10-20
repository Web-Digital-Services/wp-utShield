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

namespace EverythingItTakes\Plugin\UI;

use BrightNucleus\Views;
use EverythingItTakes\Plugin\Infrastructure\Options\FooterOptions;
use EverythingItTakes\Plugin\Registerable;

final class Footer implements Registerable {

	public function register(): void {
		add_action( 'eit_footer_text', [ $this, 'render_text' ] );
		add_action( 'eit_footer_copyright', [ $this, 'render_copyright' ] );
	}

	public function render_text(): void {
		echo Views::render( 'footer-text', $this->get_args() );
	}

	public function render_copyright(): void {
		echo Views::render( 'footer-copyright', $this->get_args() );
	}

	private function get_args(): array {
		return [
			'text'      => $this->get_footer_text(),
			'copyright' => $this->get_copyright_text()
		];
	}

	private function get_footer_text(): string {
		return get_option( 'options_' . FooterOptions::TEXT ) ?: '';
	}

	private function get_copyright_text(): string {
		return get_option( 'options_' . FooterOptions::COPYRIGHT ) ?: '';
	}

}
