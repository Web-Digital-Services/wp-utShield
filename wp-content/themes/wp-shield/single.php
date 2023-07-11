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
<?php
	$newsTermObject = wp_shield_define_terms_with_YOAST();
	//var_dump($newsTermObject);
	$category_name = $newsTermObject->category_name;
	$category_link = $newsTermObject->category_link;
	$category_slug = $newsTermObject->category_slug;
	//$args_related = $newsTermObject->args_related;
	$news_SectionTitle = $newsTermObject->news_SectionTitle;
?>
<?php //get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', '' ); ?>
				<?php //the_post_navigation(); ?>
				<?php //comments_template(); ?>
				<?php if (is_singular('post')){
						echo '<section class="less-roomy"><strong>Article Categories: </strong>';
						the_category( ', ' );
						echo '</section>';
						#do_action( 'foundationpress_post_before_comments' );
						#comments_template();
						#do_action( 'foundationpress_post_after_comments' );
						}
					?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php load_theme_design('footer');
