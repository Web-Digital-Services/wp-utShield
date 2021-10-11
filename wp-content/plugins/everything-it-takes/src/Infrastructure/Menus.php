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
use BrightNucleus\Views;

final class Menus implements Registerable {

	const HEADER_RIGHT_MENU = 'eit-header-right';
	const HEADER_RIGHT_CTA_MENU = 'eit-header-right-cta';

	public function register(): void {
		add_action( 'after_setup_theme', [ $this, 'register_menus' ] );

		add_action( 'eit_header_right_menu', [ $this, 'render_header_right_menu' ] );
		add_action( 'eit_header_right_cta_menu', [ $this, 'render_header_right_cta_menu' ] );
	}

	public function register_menus() {
		register_nav_menus( array(
			self::HEADER_RIGHT_MENU     => 'Header Right',
			self::HEADER_RIGHT_CTA_MENU => 'Header Right (CTA)'
		) );
	}

	public function render_header_right_menu() {
		$this->render_menu( self::HEADER_RIGHT_MENU );
	}

	public function render_header_right_cta_menu(): void {
		$this->render_menu( self::HEADER_RIGHT_CTA_MENU );
	}

	private function render_menu( string $menu_slug ): void {
		$menu_items = $this->get_menu_items_by_location( $menu_slug );

		if ( empty( $menu_items ) ) {
			return;
		}

		echo Views::render( 'menus/' . $menu_slug, [ 'menu_items' => $menu_items ] );
	}

	private function get_menu_items_by_location( string $menu_location_slug ): array {
		$menu_locations = get_nav_menu_locations();
		$menu           = wp_get_nav_menu_object( $menu_locations[ $menu_location_slug ] );

		return false !== $menu ? wp_get_nav_menu_items( $menu->name ) : [];
	}
}
