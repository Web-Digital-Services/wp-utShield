<?php 
/**
 * Load all template files for WP Bakery and load them before VC INIT
 */
add_action( 'vc_before_init', 'vc_before_init_actions' );
function vc_before_init_actions() {
    // Load custom elements
    require_once( get_template_directory().'/library/wp-shield/wpbakery/accordions-tabs.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/alerts.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/bleeding-image.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/buttons.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/cards.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/contact-card.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/contact-card-multiple.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/contact.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/directory-listing.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/events.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/callout-content.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/callout-sidecar.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/callout-interactive.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/charts.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/icons.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/icons-ut-health-map.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/links.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/lists.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/quickfacts_callout.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/quickfacts-row.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/quickfacts-single.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/subnav.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/video-embed.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/author-quote.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/blockquote-orbit.php');
    require_once( get_template_directory().'/library/wp-shield/wpbakery/heading.php' );
    require_once( get_template_directory().'/library/wp-shield/wpbakery/event-date.php' );
    



    //Add a custom field to inner row 
    vc_add_param("vc_row_inner", array(
        'type' => 'textfield',
        'heading' => __( 'Equilizer ID', 'ut-health' ),
        'param_name' => 'equilizer_id',
        'description' => esc_html__( 'This feature will can be used to match the heights of elements in the row. ', 'ut-health' ),
        'value' => __( '', 'ut-health' ),
        'group' => 'Match Heights',		
        )
    );  
}