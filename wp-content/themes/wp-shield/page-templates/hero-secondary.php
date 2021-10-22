<?php
/*
Template Name: Hero (Secondonary)
*/
load_theme_design('header'); ?>
<?php get_template_part( 'template-parts/banners/hero-secondary', get_post_format() ); ?>
<main class="shell shell--alt grid-container">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</main>
<?php
load_theme_design('footer');;
