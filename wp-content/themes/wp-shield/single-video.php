<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>


<?php 
	$video_url = types_render_field("video-url"); 
	$video_still = types_render_field("video-still-image");
 ?>

<div class="grid-container">
	<div class="grid-x grid-margin-x">
		<?php while ( have_posts() ) : the_post(); ?>
			
			<main class="cell small-12 medium-8 large-8">
				<?php the_title('<h1>','</h1>'); ?>
					
				<?php if ($video_url) {
					echo '<iframe width="600" height="450" src="' . $video_url . '"></iframe>';
				}?>
				<?php the_content(); ?>
				
					
			</main>
			<aside class="cell small-12 medium-4 large-4">
				<?php if ( has_post_thumbnail()) : ?>
        			<?php the_post_thumbnail('large', array('class'=> 'img-margin')); ?>
				<?php endif; ?>
				
			</aside>
		<?php endwhile; ?>
	</div>
</div>
<?php load_theme_design('footer');
