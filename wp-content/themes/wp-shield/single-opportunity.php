<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

load_theme_design('header'); ?>
<?php
    //if the post is external, meta-refresh to the actual post URL.
	$post_extLink = get_post_meta( get_the_ID(), 'external-link-url-post', true );
	if(!empty($post_extlink)){
	echo '<meta http-equiv="refresh" content="0;url=' . $post_extlink . '" />';
	}
?>
<?php //get_template_part( 'template-parts/featured-image' ); ?>
<section class="bleed">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', '' ); ?>
				<?php //the_post_navigation(); ?>
				<?php //comments_template(); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php load_theme_design('footer');
