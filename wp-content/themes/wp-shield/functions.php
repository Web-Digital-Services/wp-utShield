<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** UT Health San Antonio - Shield Theme */
require_once( 'library/wp-shield/customizer/logo-uploader.php' );
require_once( 'library/wp-shield/customizer/customizr-tweaks.php' );
require_once( 'library/wp-shield/customizer/register-menus.php' );
require_once( 'library/wp-shield/customizer/quicklinks.php' );
require_once( 'library/wp-shield/customizer/theme-design-switch.php' );
require_once( 'library/wp-shield/customizer/footer.php' );
require_once( 'library/wp-shield/banners/metaboxes-page-banners.php' );
require_once( 'library/wp-shield/banners/display-featured-media.php' );
require_once( 'library/wp-shield/news/external-news.php' );
require_once( 'library/wp-shield/wpbakery/wp-importer.php' );
require_once( 'library/wp-shield/shortcodes/social_media_footer.php' );
require_once( 'library/wp-shield/physicians-loop/alter-physician-loop.php' );
require_once( 'library/wp-shield/events/create-event-loop.php' );
require_once( 'library/wp-shield/events/events-ics-creator.php' );
require_once( 'library/wp-shield/events/training-events-ics-creator.php' );
require_once( 'library/wp-shield/events/symposium-child-subnav.php' );
require_once( 'library/wp-shield/wp-block-editor/block-editor-supports.php' );
require_once( 'library/wp-shield/various-tweaks/content-entry-guides.php' );

/** MODIFYING CORE FOUNDATION PRESS FILES */
require_once( 'library/modified-core/navigation.php' );
require_once( 'library/modified-core/class-foundationpress-top-bar-walker.php' );
require_once( 'library/modified-core/class-foundationpress-utility-nav-walker.php' );
require_once( 'library/modified-core/entry-meta.php' );

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** Gutenberg editor support */
require_once( 'library/gutenberg.php' );
// Deregister popper on WP Bakery pages.
add_action( 'admin_init', function() {
    if ( ! FrmAppHelper::get_param( 'vc_action' ) ) {
        return;
    }

    global $wp_scripts;
    if ( array_key_exists( 'popper', $wp_scripts->registered ) ) {
        wp_deregister_script( 'popper' );
    }
}, 12 );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );
