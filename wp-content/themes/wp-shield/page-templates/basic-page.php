<?php
/*
Template Name: Basic Page (Breadcrumbs)
*/
load_theme_design('header'); ?>
<div class="main-container">
	<div class="main-grid">
		<main class="page-content">
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php
load_theme_design('footer');;
