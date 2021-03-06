<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus(
	array(
		'main-menu'  => esc_html__( 'Main Menu', 'foundationpress' ),
		//'utility-nav'  => esc_html__( 'Utility Nav', 'foundationpress' ),
		'mobile-nav' => esc_html__( 'Mobile', 'foundationpress' ),
	)
);


/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_main_menu' ) ) {
	function foundationpress_main_menu() {
		wp_nav_menu(
			array(
				'container'      => 'nav',
				'container_class' => 'nav-bar',
				'container_id' => 'nav-bar-full',
				'menu_class'     => 'dropdown menu desktop-menu',
				'items_wrap'     => '<div class="top-bar"><div class="top-bar-left"><ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul></div></div>',
				'theme_location' => 'main-menu',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new foundationpress_main_menu_Walker(),
			)
		);
	}
}
/**
 * Mobile navigation - topbar (default) or offcanvas
 */
if ( ! function_exists( 'foundationpress_mobile_nav' ) ) {
	function foundationpress_mobile_nav() {
		wp_nav_menu(
			array(
				'container'      => 'nav',
				'container_class' => 'nav-bar',
				'container_id' => 'nav-bar-mobile',
				'menu'           => __( 'mobile-nav', 'foundationpress' ),
				'menu_class'     => 'vertical menu',
				'theme_location' => 'mobile-nav',
				'items_wrap'     => '<div class="top-bar"><div class="top-bar-left"><ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul></div></div>',
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Mobile_Walker(),
			)
		);
	}
}


/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
if ( ! function_exists( 'foundationpress_add_menuclass' ) ) {
	function foundationpress_add_menuclass( $ulclass ) {
		$find    = array( '/<a rel="button"/', '/<a title=".*?" rel="button"/' );
		$replace = array( '<a rel="button" class="button"', '<a rel="button" class="button"' );

		return preg_replace( $find, $replace, $ulclass, 1 );
	}
	add_filter( 'wp_nav_menu', 'foundationpress_add_menuclass' );
}
