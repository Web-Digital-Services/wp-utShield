<?php
/**
 * The default template for displaying page content
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php
	//Redirect the post if it is an external news page. 
	$post_extLink = get_post_meta( get_the_ID(), 'external-link-url-post', true );
	
	if(!empty($post_extLink)){
		$uth_post_detail_url = $post_extLink;
	}else{
		$uth_post_detail_url = get_permalink();
	}
?>
<article>
	<?php if ( has_post_thumbnail()): ?>
		<div class="grid-x grid-margin-x">
			<div class="cell large-7 medium-7 small-12 large-order-1 medium-order-2 small-order-2">
				<a href="<?php echo $uth_post_detail_url; ?>"><h2 class="h3 close"><?php the_title();?></h2></a>
				<strong><p><?php echo get_the_date('F j, Y'); ?></p></strong>
				<?php the_excerpt(); ?>
			</div>
			<div class="cell large-5 medium-5 small-12 large-order-2 medium-order-1 small-order-1">
				<?php the_post_thumbnail( 'medium' ); ?>
				<br>
			</div>
			<br>
		</div>
		<?php else: ?>
			<div class="grid-x grid-margin-x">
			<div class="less-roomy cell large-12">
				<a href="<?php echo $uth_post_detail_url; ?>"><h2 class="h3 close"><?php the_title();?></h2></a>
				<strong><p><?php echo get_the_date('F j, Y'); ?></p></strong>
				<?php the_excerpt(); ?>
			</div>
		</div>
	<?php endif ?> 
	<?php edit_post_link( __( '(Edit this post)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
</article>
<hr>