<?php
/**
 * The default template for displaying the homepage banner
 *
 * The homepage banner features a full width image and text box with a call to action. 
 * The recommended image size is 1525x400px
 * 
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>	
<?php 
	$secondary_logo = get_post_meta( get_the_ID(), 'ut-secondary-logo', true ); 
	$banner_extra_classes = get_post_meta( get_the_ID(), 'banner-extra-classes', true ); 
	$spacing_classes = get_post_meta( get_the_ID(), 'banner-classes', true ); 
	$gridx_classes = get_post_meta( get_the_ID(), 'banner-gridx-classes', true ); 
	$banner_button_text = get_post_meta( get_the_ID(), 'banner-button-text', true ); 
	$banner_button_url = get_post_meta( get_the_ID(), 'banner-button-url', true ); 
	$banner_button_text2 = get_post_meta( get_the_ID(), 'banner-button-text2', true ); 
	$banner_button_url2 = get_post_meta( get_the_ID(), 'banner-button-url2', true ); 
	$banner_eyebrow = get_post_meta( get_the_ID(), 'banner-eyebrow', true);
	$banner_title = get_post_meta( get_the_ID(), 'banner-title', true);
	$banner_featured_class = get_post_meta( get_the_ID(), 'featured-text-class', true );
	$banner_byline = get_post_meta( get_the_ID(), 'banner-byline', true );
	$banner_subhead = get_post_meta( get_the_ID(), 'banner-subhead', true );
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$imgID  = get_post_thumbnail_id($post->ID); 
	$imgAlt = get_post_meta($imgID,'_wp_attachment_image_alt', true);
	$title_box_alignment = get_post_meta( $post->ID, 'title_box_key', true ); 
	$callout_color = get_post_meta( $post->ID, 'callout_color_key', true ); 

	if ($title_box_alignment == 'right-aligned'){
		$text_box_order = 'small-order-2 medium-order-2 large-order-2';
	}else{
		$text_box_order = "";
	}


	$grid_layout = get_post_meta( $post->ID, 'banner_grid_layout_key', true );
	if (empty($grid_layout) || ($grid_layout == '84')){
		$column_left_css = 'cell large-8 medium-8 small-12 ';
		$column_right_css = 'cell large-4 medium-4 small-12';
	}elseif($grid_layout == '75'){
		$column_left_css = 'cell large-7 medium-7 small-12';
		$column_right_css = 'cell large-5 medium-5 small-12';
	}else{
		$column_left_css = 'cell large-8 medium-8 small-12';
		$column_right_css = 'cell large-4 medium-4 small-12';
	}
?>
	<section class="hero bleed img-fill <?php echo $banner_extra_classes; ?>">
		<img alt="<?php echo $imgAlt; ?>" src="<?php echo $thumb['0'];?>">
		<div class="grid-container<?php echo ' ' . $spacing_classes;?>">
			<div class="grid-x grid-margin-x<?php echo ' ' . $gridx_classes;?>">
				<div class="<?php echo $column_right_css; ?> <?php echo $text_box_order; ?>">
					<div class="callout <?php echo $callout_color; ?>">
					<img alt="<?php the_title(); ?>" src="<?php echo $secondary_logo;?>">
					<?php 
						if( !empty( $banner_eyebrow ) ) {
							echo '<p class="eyebrow">' . $banner_eyebrow, '</p>';
						}        
						if( !empty( $banner_title ) ) {
							echo '<h1 class="close">' . $banner_title, '</h1>';
						}
						if( !empty( $banner_subhead ) ) {
							echo '<p class="subheader">' . $banner_subhead, '</p>';
						} 
						if ( !empty($banner_featured_class) ) {
							$class = ' ' . $banner_featured_class;
						} 
						// Checks and displays the retrieved value
						if( !empty( $banner_byline ) ) {
							echo '<p class="banner-text' . $class . '">' . $banner_byline, '</p>';
						}
						if( !empty( $banner_button_text ) ) {
							echo '<div class="button-group">';
							if( !empty( $banner_button_text ) ) { echo '<p><a class="button" href="' . $banner_button_url, '">' . $banner_button_text, '</a></p>'; }
							if( !empty( $banner_button_text2 ) ) { echo '<p><a class="button ghost" href="' . $banner_button_url2, '">' . $banner_button_text2, '</a></p>'; }
							echo '</div>';
						} 
					?>
				</div>
				</div>
			</div>
		</div>
	</section>