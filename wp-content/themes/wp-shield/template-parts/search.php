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
<li>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php
				if ( is_single() ) {
					the_title( '<h2 class="entry-title">', '</h2>' );
				} else {
					the_title( '<h2 class="h4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			?>
		</header>
		<div class="entry-content">
			<?php the_excerpt(); ?>
			<?php edit_post_link( __( '(Edit this entry)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</article>
</li>