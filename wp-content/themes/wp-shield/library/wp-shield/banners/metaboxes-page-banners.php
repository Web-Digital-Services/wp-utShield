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
                <input type="radio" name="banner_design" checked="checked" value="default-bleed" <?php checked( $banner_design, 'default-bleed' ); ?>>Default (Beige) (Can use a video with this banner type.)<br>
                <input type="radio" name="banner_design" value="basic-page" <?php checked( $banner_design, 'basic-page' ); ?>>Basic Page (Child)<br>
                <input type="radio" name="banner_design" value="hero-banner" <?php checked( $banner_design, 'hero-banner' ); ?>>Hero Banner<br>
                <input type="radio" name="banner_design" value="hero-blur" <?php checked( $banner_design, 'hero-blur' ); ?>>Hero Blur (To add a video to the Hero Blur banner type, you must have a featured image and the video url.)<br>
                <input type="radio" name="banner_design" value="super-hero-banner" <?php checked( $banner_design, 'super-hero-banner' ); ?>>Super Hero Banner<br>
                <input type="radio" name="banner_design" value="gradient-banner" <?php checked( $banner_design, 'gradient-banner' ); ?>>Gradient Banner<br>
                <input type="radio" name="banner_design" value="grey-gradient-banner" <?php checked( $banner_design, 'grey-gradient-banner' ); ?>>Grey Gradient Banner<br>
                <input type="radio" name="banner_design" value="secondary-logo" <?php checked( $banner_design, 'secondary-logo' ); ?>>Secondary Logo<br>
                <input type="radio" name="banner_design" value="filters-banner" <?php checked( $banner_design, 'filters-banner' ); ?>>Views Filters (must enter view shortcode below)<br>
        </label>
    </p>
	<hr>

    <p>
        <label for="banner-eyebrow" class="utPress-row-title close"><?php _e( '<strong>Banner eyebrow (optional)</strong>', 'wp-shield' )?><br>
            <input type="text" size=100 name="banner-eyebrow" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-eyebrow'] ) ) echo $utPress_full_width_stored_meta['banner-eyebrow'][0]; ?>" />
        </label> 
    </p>
    <p>
    	<label for="banner-title" class="utPress-row-title close"><?php _e( '<strong>Featured Title</strong>', 'wp-shield' )?><br>
		    <input type="text" size=100 name="banner-title" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-title'] ) ) echo $utPress_full_width_stored_meta['banner-title'][0]; ?>" />
        </label> 
    </p>
    <p>
        <label for="banner-subhead" class="utPress-row-title close"><?php _e( '<strong>Banner subhead (optional)</strong>', 'wp-shield' )?><br>
            <input type="text" size=100 name="banner-subhead" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-subhead'] ) ) echo $utPress_full_width_stored_meta['banner-subhead'][0]; ?>" />
        </label> 
    </p>
        <label for="featured-text-class" class="utPress-row-title"><?php _e( '<strong>Featured Text Class</strong><br> Optionally add a class to the featured text paragraph', 'wp-shield' )?><br>
		    <input type="text" size=65 name="featured-text-class" value="<?php if ( isset ( $utPress_full_width_stored_meta['featured-text-class'] ) ) echo $utPress_full_width_stored_meta['featured-text-class'][0]; ?>" />
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
            <label for="add_breadcrumbs" class="utPress-row-title"><?php _e( '<strong>Add breadcrumbs (Only available for Default (Beige) banner  </strong><br>', 'wp-shield' )?>
                <input type="checkbox" name="add_breadcrumbs" id="add_breadcrumbs" value="yes" <?php if ( isset ( $utPress_full_width_stored_meta['add_breadcrumbs'] ) ) checked( $utPress_full_width_stored_meta['add_breadcrumbs'][0], 'yes');?> /><br>
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

        <p>
            <label for="title_box_alignment_options"><?php _e( "<strong>Title Box Alignment:</strong>", 'wp-shield' ); ?><br>
                <?php $title_box_alignment = get_post_meta( $post->ID, 'title_box_key', true ); ?> 
                    <input type="radio" name="titlebox_alignment_selection" checked="checked" value="right-aligned" <?php checked( $title_box_alignment, 'right-aligned' ); ?>> Right Aligned<br>
                    <input type="radio" name="titlebox_alignment_selection" value="left-aligned" <?php checked( $title_box_alignment, 'left-aligned' ); ?>> Left Aligned<br>
            </label>
        </p>
            <br>
    <span style="font-size:1.5em;">Secondary Logo:</span><br>    <p>
        <span for="ut-secondary-logo"><?php _e( '<strong class="utPress-row-title">Image URL:</strong><br>Enter the full URL of a secondary logo.', 'utPress-textdomain' )?></span> 
        <br>
        <input type="text" size=65 name="ut-secondary-logo" value="<?php if ( isset ( $utPress_full_width_stored_meta['ut-secondary-logo'] ) ) echo $utPress_full_width_stored_meta['ut-secondary-logo'][0]; ?>" />
    </p>
    <span style="font-size:1.5em;">Admin Customizations:</span><br>
            <p>
            <label for="banner-views" class="utPress-row-title close"><?php _e( "<strong>View shortcode</strong><br> Use only with Views Filters banner option. Example:[wpv-form-view name='your_view']", 'wp-shield' )?><br>
                <input type="text" size=100 name="banner-views" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-views'] ) ) echo $utPress_full_width_stored_meta['banner-views'][0]; ?>" />
            </label> 
        </p>
            <p>
            <label for="banner-extra-classes" class="utPress-row-title close"><?php _e( "<strong>HEADER classes - extra classes on banner.</strong> These apply to header tag.", 'wp-shield' )?><br>
                <input type="text" size=100 name="banner-extra-classes" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-extra-classes'] ) ) echo $utPress_full_width_stored_meta['banner-extra-classes'][0]; ?>" />
            </label> 
        </p>
        <p>
            <label for="banner-classes" class="utPress-row-title"><?php _e( '<strong>GRID-CONTAINER classes - additional CSS Class for Banner Spacing</strong><br> *This feature is optional, leave blank if not needed. These apply to the grid-container.', 'wp-shield' )?><br>
                <input type="text" size=65 name="banner-classes" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-classes'] ) ) echo $utPress_full_width_stored_meta['banner-classes'][0]; ?>" />
            </label> 
        </p>        <p>
            <label for="banner-gridx-classes" class="utPress-row-title"><?php _e( '<strong>GRID-X classes - additional classes on grid-x.</strong><br> *This feature is optional, leave blank if not needed. These apply to the grid-x.', 'wp-shield' )?><br>
                <input type="text" size=65 name="banner-gridx-classes" value="<?php if ( isset ( $utPress_full_width_stored_meta['banner-gridx-classes'] ) ) echo $utPress_full_width_stored_meta['banner-gridx-classes'][0]; ?>" />
            </label> 
        </p>

    <?php if($banner_design == 'hero-banner' || $banner_design == 'hero-blur' || $banner_design == 'super-hero-banner' || $banner_design == 'secondary-logo'): ?>
        <p>
            <label for="callout_color_options"><?php _e( "<strong>Callout Color:</strong>", 'wp-shield' ); ?><br>
                <?php $callout_color = get_post_meta( $post->ID, 'callout_color_key', true ); ?> 
                    <input type="radio" name="callout_color_selection" checked="checked" value="grey" <?php checked( $callout_color, 'grey' ); ?>> Grey<br>
                    <input type="radio" name="callout_color_selection" value="orange" <?php checked( $callout_color, 'orange' ); ?>> Orange<br>
                    <input type="radio" name="callout_color_selection" value="white" <?php checked( $callout_color, 'white' ); ?>> White<br>
            </label>
        </p>
        <p>
            <label for="align-center-middle" class="utPress-row-title"><?php _e( '<strong>Check this box to add the align-center-middle class to the grid-x div</strong><br>', 'wp-shield' )?>
                <input type="checkbox" name="align-center-middle" id="align-center-middle" value="yes" <?php if ( isset ( $utPress_full_width_stored_meta['align-center-middle'] ) ) checked( $utPress_full_width_stored_meta['align-center-middle'][0], 'yes');?> /><br>
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
    if ( isset( $_POST[ 'banner-eyebrow' ] ) ) {
        update_post_meta( $post_id, 'banner-eyebrow', sanitize_text_field( $_POST[ 'banner-eyebrow' ] ) );
    }
    if ( isset( $_POST[ 'banner-subhead' ] ) ) {
        update_post_meta( $post_id, 'banner-subhead', sanitize_text_field( $_POST[ 'banner-subhead' ] ) );
    }
    if ( isset( $_POST[ 'banner-views' ] ) ) {
        update_post_meta( $post_id, 'banner-views', sanitize_text_field( $_POST[ 'banner-views' ] ) );
    }
    if ( isset( $_POST[ 'banner-extra-classes' ] ) ) {
        update_post_meta( $post_id, 'banner-extra-classes', sanitize_text_field( $_POST[ 'banner-extra-classes' ] ) );
    }
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
    if ( isset( $_POST[ 'banner-classes' ] ) ) {
        update_post_meta( $post_id, 'banner-classes', sanitize_text_field( $_POST[ 'banner-classes' ] ) );
    }
    if ( isset( $_POST[ 'banner-gridx-classes' ] ) ) {
        update_post_meta( $post_id, 'banner-gridx-classes', sanitize_text_field( $_POST[ 'banner-gridx-classes' ] ) );
    }
    if ( isset( $_POST[ 'featured-text-class' ] ) ) {
        update_post_meta( $post_id, 'featured-text-class', sanitize_text_field( $_POST[ 'featured-text-class' ] ) );
    }
    //Save Checkboxes
    if( isset( $_POST[ 'disable_alamo_footer' ] ) ) {
        update_post_meta( $post_id, 'disable_alamo_footer', 'yes' );
    } else {
        update_post_meta( $post_id, 'disable_alamo_footer', 'no' );
    }
    if( isset( $_POST[ 'add_breadcrumbs' ] ) ) {
        update_post_meta( $post_id, 'add_breadcrumbs', 'yes' );
    } else {
        update_post_meta( $post_id, 'add_breadcrumbs', 'no' );
    }
    if( isset( $_POST[ 'colorized' ] ) ) {
        update_post_meta( $post_id, 'colorized', 'yes' );
    } else {
        update_post_meta( $post_id, 'colorized', 'no' );
    }
    if( isset( $_POST[ 'align-center-middle' ] ) ) {
        update_post_meta( $post_id, 'align-center-middle', 'yes' );
    } else {
        update_post_meta( $post_id, 'align-center-middle', 'no' );
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
    //Media
    if ( isset( $_POST[ 'ut-secondary-logo' ] ) ) {
        update_post_meta( $post_id, 'ut-secondary-logo', sanitize_text_field( $_POST[ 'ut-secondary-logo' ] ) );
    }
    if ( isset( $_POST[ 'banner-classes' ] ) ) {
        update_post_meta( $post_id, 'banner-classes', sanitize_text_field( $_POST[ 'banner-classes' ] ) );
    }
}
add_action( 'save_post_page', 'UTH_save_full_width_meta', 10, 3 );