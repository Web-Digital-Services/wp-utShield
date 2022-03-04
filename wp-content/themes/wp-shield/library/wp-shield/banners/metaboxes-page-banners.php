<?php
/**
 * Custom metaboxes for our page templates. 
 *
 * @package FoundationPress
 * @since FoundationPress 1.1
 */
/** Step 1: Create the metabox and link it to the post type **/
function ut_homepage_banner_meta_box() {
    global $post;
    if(!empty($post))
    {
        //The function below is a core WordPress function for adding Metaboxes and it takes 5 parameters, add_meta_box($parameters)
		add_meta_box( 
		'meta-box-id', //Metabox ID, you can make this up, I would recommend making it more descriptive than I did here. 
		__( 'Page Banner Customization', 'wp-shield' ), //Metabox Title, text_domain. Use the same text domain name in your theme or plugin. Keep is consistent. 
		'utPress_full_width_callback', //This is the callback function that will store the custom fields. This should match the function name in step 2.  
		'page', //The post type that these boxes will display on. 
		'normal', //
        'high'
		);
    }
}
add_action( 'add_meta_boxes', 'ut_homepage_banner_meta_box' );
/** Step 2: Create the fields that go in the metabox you just created. **/
function utPress_full_width_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'wp_shield_nonce' );
    $utPress_full_width_stored_meta = get_post_meta( $post->ID );
    ?>
    <p>
        <?php $banner_design = get_post_meta( $post->ID, 'banner_design_key', true ); ?>
            <label for="banner_design"><?php _e( "<strong>Banner Design:</strong>", 'wp-shield' ); ?>
                <br />  
                <input type="radio" name="banner_design" checked="checked" value="default-bleed" <?php checked( $banner_design, 'default-bleed' ); ?>>Default Banner<br>
                <input type="radio" name="banner_design" value="hero-banner" <?php checked( $banner_design, 'hero-banner' ); ?>>Hero Banner<br>
                <input type="radio" name="banner_design" value="super-hero-banner" <?php checked( $banner_design, 'super-hero-banner' ); ?>>Super Hero Banner<br>
                <input type="radio" name="banner_design" value="video-banner" <?php checked( $banner_design, 'video-banner' ); ?>>Video Banner<br>
        </label>
    </p>
    <?php 
    // echo '<p><strong>How to Use:</strong> This section is for editing the page banner. <br>';
    // $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    //     if($pageTemplate == 'page-templates/hero-banner-page.php'){
    //         echo '<strong>Image Size:</strong> 1550px by 700px. (Set as the featured image for the page)<br></p>';
    //         echo 'Example of the Hero Banner can be seen below<br></p>';
    //         $example_image = '/dist/assets/images/core/banner-example-hero-full-width.jpg';
    //     }else{
    //         echo '<strong>Image Size:</strong> 500px by 350px. (Set as the featured image for the page)<br></p>';
    //         echo 'Example of the default page banner can be seen below<br></p>';
    //         $example_image = '/dist/assets/images/core/default-page-banner.jpg';
    //     }
    ?>
	<!-- <img src="<?php //echo get_bloginfo('template_directory') . $example_image ?>"> -->

	<hr>
    <p>
    	<label for="banner-title" class="utPress-row-title close"><?php _e( '<strong>Featured Title</strong>', 'wp-shield' )?><br>
		    <input type="text" size=100 name="banner-title" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-title'] ) ) echo $utPress_full_width_stored_meta['banner-title'][0]; ?>" />
        </label> 
    </p>
    <p>
        <label for="banner-byline" class="utPress-row-title"><?php _e( '<strong>Featured Text</strong>', 'wp-shield' )?></label><br>
        <textarea cols="100" rows="2" name="banner-byline" id="banner-byline"><?php if ( isset ( $utPress_full_width_stored_meta['banner-byline'] ) ) echo $utPress_full_width_stored_meta['banner-byline'][0]; ?></textarea>
    </p>
	<p>
        <label for="banner-button-text" class="utPress-row-title"><?php _e( '<strong>Button Text</strong><br> *This button feature is optional, leave blank if not needed', 'wp-shield' )?><br>
		    <input type="text" size=65 name="banner-button-text" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-button-text'] ) ) echo $utPress_full_width_stored_meta['banner-button-text'][0]; ?>" />
        </label> 
    </p>
	<p>
        <label for="banner-button-url" class="utPress-row-title"><?php _e( '<strong>Button URL/Link</strong><br> Please enter a full URL. Example: http://uthscsa.edu/ (optional)', 'wp-shield' )?><br>
		    <input type="text" size=65 name="banner-button-url" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-button-url'] ) ) echo $utPress_full_width_stored_meta['banner-button-url'][0]; ?>" />
        </label>
    </p>
    <br>
    <p>
        <label for="banner-button-text2" class="utPress-row-title"><?php _e( '<strong>2nd Button Text</strong><br> *This button feature is optional, leave blank if not needed', 'wp-shield' )?></label> 
        <br>
		<input type="text" size=65 name="banner-button-text2" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-button-text2'] ) ) echo $utPress_full_width_stored_meta['banner-button-text2'][0]; ?>" />
    </p><br>
	<p>
        <label for="banner-button-url2" class="utPress-row-title"><?php _e( '<strong>2nd Button URL/Link</strong><br> Please enter a full URL. Example: http://uthscsa.edu/ (optional)', 'wp-shield' )?></label> 
        <br>
		<input type="text" size=65 name="banner-button-url2" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-button-url2'] ) ) echo $utPress_full_width_stored_meta['banner-button-url2'][0]; ?>" />
    </p>
    <hr><br>
    <span style="font-size:1.5em;">Advanced Options:</span><br>
        <p>
            <label for="disable_alamo_footer" class="utPress-row-title"><?php _e( '<strong>Disable Footer Alamo </strong><br>', 'wp-shield' )?>
                <input type="checkbox" name="disable_alamo_footer" id="disable_alamo_footer" value="yes" <?php if ( isset ( $utPress_full_width_stored_meta['disable_alamo_footer'] ) ) checked( $utPress_full_width_stored_meta['disable_alamo_footer'][0], 'yes');?> /><br>
            </label>
        </p>
        <p>
            <?php $banner_grid_layout_meta = get_post_meta( $post->ID, 'banner_grid_layout_key', true ); //banner_grid_layout_key is a meta_key. ?>
            <label for="banner_grid_layout"><?php _e( "<strong>Banner Layout (Grid Sizes)</strong>", 'wp-shield' ); ?>
                <br />  
                <input type="radio" name="banner_grid_layout" checked="checked" value="84" <?php checked( $banner_grid_layout_meta, '84' ); ?>>8/4<br>
                <input type="radio" name="banner_grid_layout" value="75" <?php checked( $banner_grid_layout_meta, '75' ); ?>>7/5<br>
            </label>
        </p>
    <?php if($banner_design == 'hero-banner' || $banner_design == 'super-hero-banner' ): ?>
        <!-- Load Only on the Homepage Banner Template Pages -->
        <p>
            <label for="callout_color_options"><?php _e( "<strong>Callout Color:</strong>", 'wp-shield' ); ?><br>
                <?php $callout_color = get_post_meta( $post->ID, 'callout_color_key', true ); ?> 
                    <input type="radio" name="callout_color_selection" checked="checked" value="grey" <?php checked( $callout_color, 'grey' ); ?>> Grey<br>
                    <input type="radio" name="callout_color_selection" value="orange" <?php checked( $callout_color, 'orange' ); ?>> Orange<br>
                    <input type="radio" name="callout_color_selection" value="white" <?php checked( $callout_color, 'white' ); ?>> White<br>
            </label>
        </p>
        <p>
            <label for="colorized" class="utPress-row-title"><?php _e( '<strong>Enable Colorized Background Image Overlay</strong><br>', 'wp-shield' )?>
                <?php $UTH_colorized_banner = get_post_meta( $post->ID ); ?>
                <input type="checkbox" name="colorized" id="colorized" value="yes" <?php if ( isset ( $UTH_colorized_banner['colorized'] ) ) checked( $UTH_colorized_banner['colorized'][0], 'yes');?> />
            </label>
        </p>
        <p>
            <label for="extra-roomy-button" class="utPress-row-title"><?php _e( '<strong>Enable Extra Roomy Padding on Page</strong><br>', 'wp-shield' )?>
                <input type="checkbox" name="extraroomy" id="extraroomy" value="yes" <?php if ( isset ( $utPress_full_width_stored_meta['extraroomy'] ) ) checked( $utPress_full_width_stored_meta['extraroomy'][0], 'yes');?> />
            </label>
        </p>
        <p>
            <label for="title_box_alignment_options"><?php _e( "<strong>Title Box Alignment:</strong>", 'wp-shield' ); ?><br>
                <?php $title_box_alignment = get_post_meta( $post->ID, 'title_box_key', true ); ?> 
                    <input type="radio" name="titlebox_alignment_selection" checked="checked" value="right-aligned" <?php checked( $title_box_alignment, 'right-aligned' ); ?>> Right Aligned<br>
                    <input type="radio" name="titlebox_alignment_selection" value="center-aligned" <?php checked( $title_box_alignment, 'center-aligned' ); ?>> Centered<br>
                    <input type="radio" name="titlebox_alignment_selection" value="left-aligned" <?php checked( $title_box_alignment, 'left-aligned' ); ?>> Left Aligned<br>
            </label>
        </p>
    <?php endif; ?>
    <?php
}
/** Step 3: Save the fields to the database **/
function UTH_save_full_width_meta( $post_id ) {
    if ( !isset( $_POST['wp_shield_nonce'] ) || !wp_verify_nonce( $_POST['wp_shield_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
    //Save Text Fields
    if ( isset( $_POST[ 'banner-title' ] ) ) {
        update_post_meta( $post_id, 'banner-title', sanitize_text_field( $_POST[ 'banner-title' ] ) );
    }
    if ( isset( $_POST[ 'banner-byline' ] ) ) {
    	update_post_meta( $post_id, 'banner-byline', sanitize_text_field( $_POST[ 'banner-byline' ] ) );
    }   
    if ( isset( $_POST[ 'banner-button-text' ] ) ) {
        update_post_meta( $post_id, 'banner-button-text', sanitize_text_field( $_POST[ 'banner-button-text' ] ) );
    }
	if ( isset( $_POST[ 'banner-button-url' ] ) ) {
        update_post_meta( $post_id, 'banner-button-url', sanitize_text_field( $_POST[ 'banner-button-url' ] ) );
    }
    if ( isset( $_POST[ 'banner-button-text2' ] ) ) {
        update_post_meta( $post_id, 'banner-button-text2', sanitize_text_field( $_POST[ 'banner-button-text2' ] ) );
    }
	if ( isset( $_POST[ 'banner-button-url2' ] ) ) {
    	update_post_meta( $post_id, 'banner-button-url2', sanitize_text_field( $_POST[ 'banner-button-url2' ] ) );
    }
    //Save Checkboxes
    if( isset( $_POST[ 'disable_alamo_footer' ] ) ) {
        update_post_meta( $post_id, 'disable_alamo_footer', 'yes' );
    } else {
        update_post_meta( $post_id, 'disable_alamo_footer', 'no' );
    }
    if( isset( $_POST[ 'colorized' ] ) ) {
        update_post_meta( $post_id, 'colorized', 'yes' );
    } else {
        update_post_meta( $post_id, 'colorized', 'no' );
    }
    if( isset( $_POST[ 'large-text-toggle' ] ) ) {
        update_post_meta( $post_id, 'large-text-toggle', 'yes' );
    } else {
        update_post_meta( $post_id, 'large-text-toggle', 'no' );
    }
    if( isset( $_POST[ 'extraroomy' ] ) ) {
        update_post_meta( $post_id, 'extraroomy', 'yes' );
    } else {
        update_post_meta( $post_id, 'extraroomy', 'no' );
    }
    //Save Callout Alignment
	if ( isset( $_REQUEST['titlebox_alignment_selection'] ) ) {
		update_post_meta( $post_id, 'title_box_key', sanitize_text_field( $_POST['titlebox_alignment_selection'] ) );
    }
    //Save Colors
	if ( isset( $_REQUEST['callout_color_selection'] ) ) {
		update_post_meta( $post_id, 'callout_color_key', sanitize_text_field( $_POST['callout_color_selection'] ) );
    }
    if ( isset( $_REQUEST['banner_design'] ) ) {
		update_post_meta( $post_id, 'banner_design_key', sanitize_text_field( $_POST['banner_design'] ) );
	}
    if ( isset( $_REQUEST['banner_grid_layout'] ) ) {
		update_post_meta( $post_id, 'banner_grid_layout_key', sanitize_text_field( $_POST['banner_grid_layout'] ) );
	}
}
add_action( 'save_post_page', 'UTH_save_full_width_meta', 10, 3 );