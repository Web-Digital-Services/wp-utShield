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
<?php 
if ( has_post_thumbnail() ) {
    $block_one = 7;
	$block_two = 5;
}
else {
    $block_one = 12;
	$block_two = 0;
}
?>
<div id="post-<?php the_ID(); ?>">
	<div class="entry-content">
		<div class="row">
			<div class="columns large-<?php echo $block_one; ?>">
			<header>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<!-- Removed the post meta by commenting out the function below -->
				<?php //foundationpress_entry_meta(); ?>
			</header>
			<?php $utPress_event_stored_meta = get_post_meta( get_the_ID(), 'event-date', true ); if( !empty( $utPress_event_stored_meta ) ) { echo ' <span class="event-date-archive"> Event Date: </span><span class="event-archive" style="color:black;">' . $utPress_event_stored_meta , '</span>';} ?>
			<?php $utPress_event_stored_meta = get_post_meta( get_the_ID(), 'event-end-date', true ); if( !empty( $utPress_event_stored_meta ) ) { echo '<span class="event-archive" style="color:black;> - ' . $utPress_event_stored_meta , '</span>';} ?>
			<br>
			<?php $utPress_event_stored_meta = get_post_meta( get_the_ID(), 'event-time', true ); if( !empty( $utPress_event_stored_meta ) ) { echo ' <span class="event-time-archive"> Event Time: </span><span class="event-archive" style="color:black;>' . $utPress_event_stored_meta , '</span>';} ?>
			<br>
			<?php if ( has_excerpt( $post->ID ) ) {
					echo '<div class="excerptContent">';
					the_excerpt();
					echo '</div>';
				} else {
					// This post has no excerpt
				}
			?>
			<a href="<?php the_permalink();?>" class="button">Event Details</a>
			</div>
			<div class="columns large-<?php echo $block_two; ?>">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Read More About <?php the_title(); ?>"> 
				<?php the_post_thumbnail('blog-image-thumbnail', array( 'class' => 'fadeEvent' )); ?> </a>
			</div>
		</div>
		<?php the_content( __( 'Continue reading...', 'foundationpress' ) ); ?>
	</div>
	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
	<hr />
</div>

