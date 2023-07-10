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
	/** Localize Metafield Values as Variables **/
	$banner_extra_classes = get_post_meta( get_the_ID(), 'banner-extra-classes', true ); 
	$spacing_classes = get_post_meta( get_the_ID(), 'banner-classes', true ); 
	$gridx_classes = get_post_meta( get_the_ID(), 'banner-gridx-classes', true ); 
	$banner_design = get_post_meta( $post->ID, 'banner_design_key', true );
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$imgID  = get_post_thumbnail_id($post->ID); 
	$imgAlt = get_post_meta($imgID,'_wp_attachment_image_alt', true);
	$banner_featured_class = get_post_meta( get_the_ID(), 'featured-text-class', true );
	$banner_byline = get_post_meta( get_the_ID(), 'banner-byline', true );
	$banner_eyebrow = get_post_meta( get_the_ID(), 'banner-eyebrow', true);
	$banner_subhead = get_post_meta( get_the_ID(), 'banner-subhead', true);
	$banner_title = get_post_meta( get_the_ID(), 'banner-title', true );
	$banner_button_text = get_post_meta( get_the_ID(), 'banner-button-text', true ); 
	$banner_button_url = get_post_meta( get_the_ID(), 'banner-button-url', true ); 
	$banner_button_text2 = get_post_meta( get_the_ID(), 'banner-button-text2', true ); 
	$banner_button_url2 = get_post_meta( get_the_ID(), 'banner-button-url2', true ); 
	$title_box_alignment = get_post_meta( $post->ID, 'title_box_key', true ); 

	/** Set Positioning */
	if ($title_box_alignment == 'right-aligned'){
		$alignment_status = 'large-offset-7 medium-offset-6 small-offset-0';
		$text_position = ' right';
	}elseif($title_box_alignment == 'left-aligned'){
		$alignment_status = 'null';
		$text_position = ' left';
	}else{
		$alignment_status = 'large-offset-7 medium-offset-6 small-offset-0';
		$text_position = ' left';
	}
?>
<header class="hero gradient grey bleed <?php echo $banner_extra_classes; ?> img-fill<?php echo $text_position; ?>">
	<img alt="<?php echo $imgAlt; ?>" src="<?php echo $thumb['0'];?>">
	<div class="grid-container<?php echo ' ' . $spacing_classes;?>">
		<div class="grid-x margin-x<?php echo ' ' . $gridx_classes;?>">
      		<?php  
      			if (empty($banner_title) && empty($banner_byline) && empty($banner_button_text)){
					echo '<div class="cell large-5 medium-6 small-12 ' . $alignment_status, '"><div class="callout grey">';
					if( !empty( $banner_eyebrow ) ) {
							echo '<p class="eyebrow">' . $banner_eyebrow, '</p>';
					} 
					echo the_title('<h1>','</h1>');
					if( !empty( $banner_subhead ) ) {
							echo '<p class="subheader">' . $banner_subhead, '</p>';
					} 
					echo '</div></div>';
				}
      			//Load if the banner title, byline or button text has content. Only 1 is needed to qualify for the else if statement. 
				elseif(!empty($banner_title) || !empty($banner_byline) || !empty($banner_button_text)){
					if ( !empty($banner_featured_class) ) {
						$class = ' class="' . $banner_featured_class . '"';
					}
					//If these boxes are not empty load the banner box and push left of right depending on status
					echo '<div class="cell large-5 medium-6 small-12 ' . $alignment_status, '"><div class="callout grey">';
					if( !empty( $banner_eyebrow ) ) {
							echo '<p class="eyebrow">' . $banner_eyebrow, '</p>';
					} 
					echo '<h1>' . $banner_title, '</h1>';
					if( !empty( $banner_subhead ) ) {
							echo '<p class="subheader">' . $banner_subhead, '</p>';
					} 
					echo '<p' . $class . '>'. $banner_byline, '</p>';
					//Callback and Display the Featured Buttons
					echo '<div class="button-group">';
					if( !empty( $banner_button_text ) ) { echo '<p><a class="button" href="' . $banner_button_url, '">' . $banner_button_text, '</a></p>';}
					if( !empty( $banner_button_text2 ) ) { echo '<p><a class="button ghost" href="' . $banner_button_url2, '">' . $banner_button_text2, '</a></p>';
					}
					echo '</div>';
					echo '</div></div>';
				}else{
					//Just display the Banner. This is not recommended.
					echo '<div class="callout">' . the_title() . '</div>';
				}
			?>
		</div>
	</div>
</header>