<?php
/*
Template Name: Hero Banner
*/
load_theme_design('header'); ?>
<?php get_template_part( 'template-parts/banners/hero-primary', get_post_format() ); ?>
<main class="grid-container">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</main>
<?php
load_theme_design('footer');;
