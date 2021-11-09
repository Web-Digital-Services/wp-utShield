<?php
/**
 * The default template for displaying content
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php $eventDate = get_post_meta( get_the_ID(), 'event-date', true ); ?>
<div class="columns large-4">
    <div class="panel colorized outline white match"  data-equalizer-watch>          
        <div class="row">  
            <div class="columns small-5 small-centered">
                <a href="<?php the_permalink(); ?>" class="datebox medium center">
                    <div class="month">
                        <span class="date-display-single"><?php $getMonth = new DateTime($eventDate); $shortMonth = $getMonth->format('M'); echo $shortMonth;?></span> 
                    </div>
                    <div class="date">
                        <span class="date-display-single"><?php $getDay = new DateTime($eventDate); $displayDay = $getDay->format('d'); echo $displayDay;?></span>
                    </div>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="columns large-12 medium-12 small-12 text-center">
                <h3 class="close"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php echo '<p>';
                    echo get_the_excerpt();
                    echo '</p>';
                    ?>
            </div>
        </div>
    </div>
</div>