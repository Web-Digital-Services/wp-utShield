<?php
/*
Template Name: Hero Banner
*/
load_theme_design('header'); ?>
<?php get_template_part( 'template-parts/banners/banner-homepage', get_post_format() ); ?>
<div class="main-container">
	<div>
		<main class="page-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php
load_theme_design('footer');;
