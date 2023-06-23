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
	$banner_extra_classes = get_post_meta( get_the_ID(), 'banner-extra-classes', true ); 
	$spacing_classes = get_post_meta( get_the_ID(), 'banner-classes', true ); 
	$gridx_classes = get_post_meta( get_the_ID(), 'banner-gridx-classes', true ); 
	$banner_views = get_post_meta( get_the_ID(), 'banner-views', true ); 
	$banner_button_text = get_post_meta( get_the_ID(), 'banner-button-text', true ); 
	$banner_button_url = get_post_meta( get_the_ID(), 'banner-button-url', true ); 
	$banner_button_text2 = get_post_meta( get_the_ID(), 'banner-button-text2', true ); 
	$banner_button_url2 = get_post_meta( get_the_ID(), 'banner-button-url2', true ); 
	$banner_eyebrow = get_post_meta( get_the_ID(), 'banner-eyebrow', true);
	$banner_title = get_post_meta( get_the_ID(), 'banner-title', true);
	$banner_byline = get_post_meta( get_the_ID(), 'banner-byline', true );
	$banner_subhead = get_post_meta( get_the_ID(), 'banner-subhead', true );

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
<header>
	<section class="hero bleed <?php echo $banner_extra_classes; ?>">
		<div class="grid-container<?php echo ' ' . $spacing_classes;?>">
			<div class="grid-x grid-margin-x<?php echo ' ' . $gridx_classes;?>">
				<div class="<?php echo $column_left_css; ?>">
					<?php
						if( !empty( $banner_eyebrow ) ) {
							echo '<p class="eyebrow">' . $banner_eyebrow, '</p>';
						}        
						if( !empty( $banner_title ) ) {
							echo '<h1>' . $banner_title, '</h1>';
						}else{
							the_title('<h1>', '</h1>');
						} 
						if( !empty( $banner_subhead ) ) {
							echo '<p class="subheader">' . $banner_subhead, '</p>';
						}   
						// Checks and displays the retrieved value
						if( !empty( $banner_byline ) ) {
							echo '<p class="banner-text">' . $banner_byline, '</p>';
						}
						if( !empty( $banner_button_text ) ) {
							echo '<div class="button-group">';
							if( !empty( $banner_button_text ) ) { echo '<p><a class="button" href="' . $banner_button_url, '">' . $banner_button_text, '</a></p>'; }
							if( !empty( $banner_button_text2 ) ) { echo '<p><a class="button ghost" href="' . $banner_button_url2, '">' . $banner_button_text2, '</a></p>'; }
							echo '</div>';
						} 
					?>
				</div>
				<div class="<?php echo $column_right_css; ?>">          
					<?php
						if (function_exists('load_featured_media')) {
							load_featured_media('large', 'close');
						} elseif ( has_post_thumbnail() ){
							the_post_thumbnail();
						}else{
							//No featured Media
						}
					?>
				</div>
			</div>
			<?php
				if( !empty( $banner_views ) ) {
					echo do_shortcode($banner_views);
				}
			?>
		</div>
	</section>
</header>