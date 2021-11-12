<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<!-- Start building tha page template banner -->
<?php 
	//Get Banner content from the DB and assign to variables
	$banner_button_text = get_post_meta( get_the_ID(), 'banner-button-text', true ); 
	$banner_button_url = get_post_meta( get_the_ID(), 'banner-button-url', true ); 
	$banner_button_text2 = get_post_meta( get_the_ID(), 'banner-button-text2', true ); 
	$banner_button_url2 = get_post_meta( get_the_ID(), 'banner-button-url2', true ); 
	$banner_title = get_post_meta( get_the_ID(), 'banner-title', true);
	$banner_byline = get_post_meta( get_the_ID(), 'banner-byline', true );
	$banner_byline = get_post_meta( get_the_ID(), 'banner-byline', true );
	
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
	<section class="hero bleed">
		<div class="grid-container">
			<div class="grid-x margin-x">
				<div class="<?php echo $column_left_css; ?>">
					<?php         
						if( !empty( $banner_title ) ) {
							echo '<h1 class="close">' . $banner_title, '</h1>';
						}else{
							the_title('<h1 class="close">', '</h1>');
						}
					?>
					<?php
						// Checks and displays the retrieved value
						if( !empty( $banner_byline ) ) {
							echo '<p class="banner-text">' . $banner_byline, '</p>';
						}
					?>
					<?php 
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
						if (function_exists('display_featured_media')) {
							display_featured_media('large', 'close');
						} elseif ( has_post_thumbnail() ){
							the_post_thumbnail();
						}else{
							echo '<p class="white-text">Please install UT Featured Video Plugin</p>';
						}
					?>
				</div>
			</div>
		</div>
	</section>
</header>
<div class="grid-container">
	<main class="grid-x margin-x">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</main>
</div>
<?php
load_theme_design('footer');;
