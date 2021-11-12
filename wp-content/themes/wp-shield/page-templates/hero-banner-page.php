<?php
/*
Template Name: Hero Banner
*/
load_theme_design('header'); ?>
<?php get_template_part( 'template-parts/banners/hero-primary', get_post_format() ); ?>
<div class="grid-container">
	<main class="grid-x margin-x">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</main>
</div>
<?php
load_theme_design('footer');;
