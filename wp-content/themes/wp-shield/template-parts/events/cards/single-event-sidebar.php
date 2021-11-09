<?php
/**
 * The default template for displaying content
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php 
	$eventAltDate = get_post_meta( get_the_ID(), 'event-alt-date', true ); 
	$UTH_event_time = get_post_meta( get_the_ID(), 'event-time', true );
	$UTH_event_start_date = get_post_meta( get_the_ID(), 'event-date', true ); 
?>
<li>
	<p class="close">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</p>
	<?php 
		echo '<p class="close">';
		echo $UTH_event_start_date; 
		if( !empty( $UTH_event_time ) ) { echo ' at ' . $UTH_event_time;} 
		echo '</p>';
	?>	
</li>