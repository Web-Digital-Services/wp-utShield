<?php
/**
 * The default template for displaying content
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php $eventDate = get_post_meta( get_the_ID(), 'event-date', true ); ?>
<li class="row">  
    <div class="columns large-2 medium-3 small-4">
    	<a href="<?php the_permalink(); ?>" class="datebox">
        	<div class="month">
  				<span class="date-display-single"><?php $getMonth = new DateTime($eventDate); $shortMonth = $getMonth->format('M'); echo '<strong>' . $shortMonth . '</strong>';?></span> 
  			</div>
            <div class="date">
            	<span class="date-display-single"><?php $getDay = new DateTime($eventDate); $displayDay = $getDay->format('d'); echo $displayDay;?></span>
            </div>
    	</a>
    </div>
    <div class="columns large-10 medium-9 small-8">
        <h3 class="close"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php if ( has_excerpt( $post->ID ) ) {
                echo '<span>' . get_the_excerpt() . '</span>';
            }
        ?>
    </div>
</li>