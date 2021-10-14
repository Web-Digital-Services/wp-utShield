<?php
/*
Template Name: Hero Banner
*/
load_theme_design('header'); ?>
<?php get_template_part( 'template-parts/banners/banner-homepage', get_post_format() ); ?>
<div class="main-container">
	<main class="page-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</main>
</div>
<?php
load_theme_design('footer');;
