<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php
			if ( is_single() ) {
				//the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
	</header>

	<?php
		if (function_exists('display_featured_media')) {
			display_featured_media('large', 'far', 'true');
		} else {
			echo '<figure>';
			the_post_thumbnail('large', array( 'class' => 'featured-image-post' ));
			echo '<figcaption><?php the_post_thumbnail_caption();?></figcaption>';
			echo'</figure>';
		}
	?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
</article>
