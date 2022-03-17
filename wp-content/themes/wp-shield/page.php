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

load_theme_design('header'); 
$banner_design = get_post_meta( $post->ID, 'banner_design_key', true );
?>
<!-- Start building tha page template banner -->
<main id="main-content" class="grid-container">
	<?php 
		if ($banner_design == 'basic-page'){
			if ( function_exists('yoast_breadcrumb') ) { 
				yoast_breadcrumb('<ul class="breadcrumbs" id="breadcrumbs">','</ul><br><br>'); 
			}
			the_title('<h1>', '</h1>');
		}
	?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</main>
<?php
load_theme_design('footer');
