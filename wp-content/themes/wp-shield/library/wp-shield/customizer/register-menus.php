<?php
/** REGISTER MENUS IN WP */ 
register_nav_menus(array(
    'uth_primary_quick_links' => 'Primary Quick Links',
    'uth_secondary_quick_links' => 'Secondary Quick Links',
    'uth_third_quick_links' => 'Third Quick Links',
    'footer_menu' => 'Footer Menu',
    'subnav_1' => 'SubNav (1)',
    'subnav_2' => 'SubNav (2)',
    'subnav_3' => 'SubNav (3)',
    'subnav_4' => 'SubNav (4)',
    'subnav_5' => 'SubNav (5)',
    'subnav_6' => 'SubNav (6)',
    'subnav_7' => 'SubNav (7)',
    'subnav_8' => 'SubNav (8)',
    'subnav_9' => 'SubNav (9)',
    'subnav_10' => 'SubNav (10)',
    'subnav_11' => 'SubNav (11)',
    'subnav_12' => 'SubNav (12)',
    'subnav_13' => 'SubNav (13)',
    'subnav_14' => 'SubNav (14)',
    'subnav_15' => 'SubNav (15)',
    'subnav_16' => 'SubNav (16)',
));
/** Subnavs will be rendered in the subnav_v2 file in the shortcodes folder.  */
/** If the menu exists, wrap the HTML as follows */
/** Render QUICKLINKS */
if ( ! function_exists( 'uth_primary_quick_links' ) ) {
    function uth_primary_quick_links() {
        wp_nav_menu( array(
            'container'      => false, // Remove nav container
            'menu'           => __( 'uth_primary_quick_links', 'foundationpress' ),
            'menu_class'     => 'vertical menu wp_quicklinks',
            'theme_location' => 'uth_primary_quick_links',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'    => false,
        ));
    }
}
if ( ! function_exists( 'footer_menu' ) ) {
    function footer_menu() {
        wp_nav_menu( array(
            'container'      => false, // Remove nav container
            'menu'           => __( 'footer_menu', 'wp-shield' ),
            'menu_class'     => 'vertical menu wp_quicklinks arrow',
            'theme_location' => 'footer_menu',
            'items_wrap'     => '<ul id="%1$s" class="%2$s arrow-list">%3$s</ul>',
            'fallback_cb'    => false,
        ));
    }
}
if ( ! function_exists( 'uth_secondary_quick_links' ) ) {
    function uth_secondary_quick_links() {
        wp_nav_menu( array(
            'container'      => false, // Remove nav container
            'menu'           => __( 'uth_secondary_quick_links', 'foundationpress' ),
            'menu_class'     => 'vertical menu wp_quicklinks',
            'theme_location' => 'uth_secondary_quick_links',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'    => false,
        ));
    }
}
if ( ! function_exists( 'uth_third_quick_links' ) ) {
    function uth_third_quick_links() {
        wp_nav_menu( array(
            'container'      => false, // Remove nav container
            'menu'           => __( 'uth_third_quick_links', 'foundationpress' ),
            'menu_class'     => 'vertical menu wp_quicklinks',
            'theme_location' => 'uth_third_quick_links',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'    => false,
        ));
    }
}