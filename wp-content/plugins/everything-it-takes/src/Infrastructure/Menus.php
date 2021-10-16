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

	const MAIN_MENU_1 = 'eit-main-menu-1';
	const MAIN_MENU_2 = 'eit-main-menu-2';
	const MAIN_MENU_3 = 'eit-main-menu-3';

	const FOOTER_1_COL = 'eit-footer-1-col';
	const FOOTER_2_COL = 'eit-footer-2-col';

	const SOCIAL_MENU = 'eit-social';

	public function register(): void {
		add_action( 'after_setup_theme', [ $this, 'register_menus' ] );

		add_action( 'eit_header_right_menu', [ $this, 'render_header_right_menu' ] );
		add_action( 'eit_header_right_cta_menu', [ $this, 'render_header_right_cta_menu' ] );

		add_action( 'eit_main_menu_1', [ $this, 'render_main_menu_1' ] );
		add_action( 'eit_main_menu_2', [ $this, 'render_main_menu_2' ] );
		add_action( 'eit_main_menu_3', [ $this, 'render_main_menu_3' ] );

		add_action( 'eit_footer_1_col_menu', [ $this, 'render_footer_1_col_menu' ] );
		add_action( 'eit_footer_2_col_menu', [ $this, 'render_footer_2_col_menu' ] );

		add_action( 'eit_social_menu', [ $this, 'render_social_menu' ] );
	}

	public function register_menus() {
		register_nav_menus( array(
			self::HEADER_RIGHT_MENU     => 'Header Right',
			self::HEADER_RIGHT_CTA_MENU => 'Header Right (CTA)',

			self::MAIN_MENU_1 => 'Main Menu #1',
			self::MAIN_MENU_2 => 'Main Menu #2',
			self::MAIN_MENU_3 => 'Main Menu #3',

			self::FOOTER_1_COL => 'Footer Left (1 Column)',
			self::FOOTER_2_COL => 'Footer Right (2 Columns)',

			self::SOCIAL_MENU => 'Social',
		) );
	}

	public function render_header_right_menu() {
		$this->render_menu( self::HEADER_RIGHT_MENU );
	}

	public function render_header_right_cta_menu(): void {
		$this->render_menu( self::HEADER_RIGHT_CTA_MENU );
	}

	public function render_main_menu_1() {
		$this->render_menu( self::MAIN_MENU_1 );
	}

	public function render_main_menu_2(): void {
		$this->render_menu( self::MAIN_MENU_2 );
	}

	public function render_main_menu_3(): void {
		$this->render_menu( self::MAIN_MENU_3 );
	}

	public function render_footer_1_coL_menu() {
		$this->render_menu( self::FOOTER_1_COL );
	}

	public function render_footer_2_col_menu(): void {
		$this->render_menu( self::FOOTER_2_COL );
	}

	public function render_social_menu(): void {
		$this->render_menu( self::SOCIAL_MENU );
	}

	private function render_menu( string $menu_slug ): void {
		$menu_items = $this->get_menu_items_by_location( $menu_slug );

		if ( empty( $menu_items ) ) {
			return;
		}

		$menu_title = $this->get_menu_title_by_location( $menu_slug );

		if ( false !== strpos( $menu_slug, 'eit-main-menu' ) ) {
			$menu_slug = 'eit-main-menu';
		}

		echo Views::render( 'menus/' . $menu_slug, [ 'menu_items' => $menu_items, 'menu_title' => $menu_title ] );
	}

	private function get_menu_by_location( string $menu_location_slug ): ?\WP_Term {
		$menu_locations = get_nav_menu_locations();

		return wp_get_nav_menu_object( $menu_locations[ $menu_location_slug ] ) ?: null;
	}

	private function get_menu_items_by_location( string $menu_location_slug ): array {
		return null !== $this->get_menu_by_location( $menu_location_slug ) ? wp_get_nav_menu_items( $this->get_menu_by_location( $menu_location_slug )->name ) : [];
	}

	private function get_menu_title_by_location( string $menu_location_slug ): string {
		return null !== $this->get_menu_by_location( $menu_location_slug ) ? $this->get_menu_by_location( $menu_location_slug )->name : '';
	}
}
