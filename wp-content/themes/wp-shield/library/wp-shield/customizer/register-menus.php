<?php
/** REGISTER MENUS IN WP */ 
register_nav_menus(array(
    'uth_primary_quick_links' => 'Primary Quick Links',
    'uth_secondary_quick_links' => 'Secondary Quick Links',
    'uth_third_quick_links' => 'Third Quick Links',
    'uth_fourth_quick_links' => 'Fourth Quick Links',
    'uth_fifth_quick_links' => 'Fifth Quick Links',
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
if ( ! function_exists( 'uth_fourth_quick_links' ) ) {
    function uth_fourth_quick_links() {
        wp_nav_menu( array(
            'container'      => false, // Remove nav container
            'menu'           => __( 'uth_fourth_quick_links', 'foundationpress' ),
            'menu_class'     => 'vertical menu wp_quicklinks',
            'theme_location' => 'uth_fourth_quick_links',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'    => false,
        ));
    }
}
if ( ! function_exists( 'uth_fifth_quick_links' ) ) {
    function uth_fifth_quick_links() {
        wp_nav_menu( array(
            'container'      => false, // Remove nav container
            'menu'           => __( 'uth_fifth_quick_links', 'foundationpress' ),
            'menu_class'     => 'vertical menu wp_quicklinks',
            'theme_location' => 'uth_fifth_quick_links',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'    => false,
        ));
    }
}
/** Register Button that activates the quick links menu */
function UTH_register_quick_links(){
    if (has_nav_menu('uth_primary_quick_links')){
        $primary_menu_name = 'uth_primary_quick_links';
        $locations = get_nav_menu_locations();
        $primary_menu_id = $locations[ $primary_menu_name ] ;
        $primary_quicklinks_menu_object = wp_get_nav_menu_object($primary_menu_id);
        if (($primary_quicklinks_menu_object->count) > 0){
            echo '<p><a href="#" data-close="offCanvasLeft"><i class="fas fa-times"></i> ' .  $primary_quicklinks_menu_object->name . '</a></p>';
        }
    }
}
/** Display all sidebar items in a quicklinks panel pop out */
function UTH_render_quick_links_menu(){
    if ( has_nav_menu( 'uth_primary_quick_links' ) ) {
        $primary_menu_name = 'uth_primary_quick_links';
        $locations = get_nav_menu_locations();
        $primary_menu_id = $locations[ $primary_menu_name ] ;
        $primary_quicklinks_menu_object = wp_get_nav_menu_object($primary_menu_id);

        echo '<div class="off-canvas position-right bullet-list UTH_Off_canvas" id="offCanvas" role="navigation" aria-labelledby="quickLinks" data-off-canvas>';
        echo '<button id="quickLinks" class="close-button" aria-label="Close menu" type="button" data-close=""><span aria-hidden="true">×</span></button>';
        echo '<h2 class="close">' . $primary_quicklinks_menu_object->name . '</h2>';
        uth_primary_quick_links();

        if ( has_nav_menu( 'uth_secondary_quick_links' ) ) {
            $secondary_menu_name = 'uth_secondary_quick_links';
            $secondary_menu_id = $locations[ $secondary_menu_name ] ;
            $secondary_quicklinks_menu_object = wp_get_nav_menu_object($secondary_menu_id);
            echo '<h2 class="close">' . $secondary_quicklinks_menu_object->name . '</h2>';
            uth_secondary_quick_links();
        }
        if ( has_nav_menu( 'uth_third_quick_links' ) ) {
            $third_menu_name = 'uth_third_quick_links';
            $third_menu_id = $locations[ $third_menu_name ] ;
            $third_quicklinks_menu_object = wp_get_nav_menu_object($third_menu_id);
            echo '<h2 class="close">' . $third_quicklinks_menu_object->name . '</h2>';
            uth_third_quick_links();
        }
        echo '</div>';
    } 
}