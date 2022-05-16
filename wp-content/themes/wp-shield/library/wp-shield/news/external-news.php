<?php
/**
 * Custom metaboxes for our page templates. 
 *
 * @package FoundationPress
 * @since FoundationPress 1.1
 */
/**
 * Adds a meta box to the post editing screen
 */
//JMO - Adding Article Collections for LINC IPE website. - 09-28-2021

function ut_news_external_link_custom_meta() {
    $post_types = array('post', 'article-colletion');
    add_meta_box( 'ut_news_external_link_meta', __( 'External Link (News)', 'wpShield' ), 'ut_news_external_link_meta_callback', $post_types, 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'ut_news_external_link_custom_meta' );
/**
 * Outputs the content of the meta box
 */
function ut_news_external_link_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'ut_news_external_link_nonce' );
    $ut_news_external_link_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <label for="ut_news_external_link" class="ut_news_external_link-row-title"><?php _e( '<strong>Link to external news item</strong>', 'ut_news_external_link-textdomain' )?></label><br />If an external link is provided, then the news item will not display within this site. Instead, it will link out to the external news site.
        <input type="text" size="65" name="ut_news_external_link" id="ut_news_external_link" value="<?php if ( isset ( $ut_news_external_link_stored_meta['ut_news_external_link'] ) ) echo $ut_news_external_link_stored_meta['ut_news_external_link'][0]; ?>" />
    </p>
 
    <?php
}
/**
 * Saves the custom meta input
 */
function ut_news_external_link_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'ut_news_external_link_nonce' ] ) && wp_verify_nonce( $_POST[ 'ut_news_external_link_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'ut_news_external_link' ] ) ) {
        update_post_meta( $post_id, 'ut_news_external_link', sanitize_text_field( $_POST[ 'ut_news_external_link' ] ) );
    }
 
}
add_action( 'save_post', 'ut_news_external_link_meta_save' );
//If there is an external link, then the news item will not display within this site. It will redirect to the external link.
function ut_redirect_external_news() {
    $post_types = array('post', 'article-colletion');
    if(is_singular($post_types) ) :
        global $post;
        $link = get_post_meta($post->ID, 'ut_news_external_link', true);
        if(!empty($link)) {
            wp_redirect(esc_url($link), 301);
            exit;
        }
    endif;
}
add_action( 'template_redirect', 'ut_redirect_external_news' );
