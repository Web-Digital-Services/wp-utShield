<?php
/**
 * The default template for single events on a tan background
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php 
    #Import Single Event Date, End Date and Event Location
    $eventDate = get_post_meta( get_the_ID(), 'event-date', true );
    $eventDateRAW = get_post_meta( get_the_ID(), 'event-alt-date', true );
    $eventEndDate = get_post_meta( get_the_ID(), 'event-end-date', true ); 
    $eventLocation = get_post_meta( get_the_ID(), 'event-location', true );
    $dayofweek = date('l', strtotime($eventDateRAW));
    //$result    = date('Y-m-d', strtotime(($eventDateRAW - $dayofweek).' day', strtotime($eventDateRAW)));
    #Create single event date format
    $newDate_SingleDay = new DateTime($eventDate); $showSingleDayFormat = $newDate_SingleDay->format('l, F jS, Y');
    #Create multiday event date formats (Same Month)
    $newDate_MultiDay_FirstDay = new DateTime($eventDate); $showMultiDay_FirstDay = $newDate_MultiDay_FirstDay->format('F jS');
    $newDate_MultiDay_LastDay = new DateTime($eventEndDate); $show_MultiDay_LastDay = $newDate_MultiDay_LastDay->format('jS, Y');
    #Getting months to compare if the month changes for a multi day event
    $MultiDay_CheckFirstMonth = new DateTime($eventDate); $MultiDay_CompareFirstMonth = $MultiDay_CheckFirstMonth->format('M');
    $MultiDay_CheckLastMonth = new DateTime($eventEndDate); $MultiDay_CompareLastMonth = $MultiDay_CheckLastMonth->format('M');
    #Create multiday event date formats (Different End Month)
    $MultiDay_LastDay_DifferentMonth = new DateTime($eventEndDate); $show_MultiDay_LastDay_DifferentMonth = $MultiDay_LastDay_DifferentMonth->format('F jS, Y');

    if (empty($eventEndDate)){
        $eventDateFormat = $showSingleDayFormat;
    }elseif((!empty($eventEndDate)) && ($MultiDay_CompareFirstMonth != $MultiDay_CompareLastMonth)){
        $eventDateFormat = $showMultiDay_FirstDay . ' - ' . $show_MultiDay_LastDay_DifferentMonth;
    }else{
        $eventDateFormat = $showMultiDay_FirstDay . ' - ' . $show_MultiDay_LastDay;
    }
?>
<div class="cell small-4 medium-4 large-4">
    <div class="grid-x grid-margin-x">
        <div class="cell small-4 medium-4 large-4">
            <a href="#">
                <div class="datebox">
                    <div class="month"><?php $getMonth = new DateTime($eventDate); $shortMonth = $getMonth->format('M'); echo $shortMonth;?></div>
                    <div class="day"><?php $getDay = new DateTime($eventDate); $displayDay = $getDay->format('d'); echo $displayDay;?></div>
                </div>
            </a>
        </div>
        <div class="cell small-8 medium-8 large-8">
            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            <p><?php echo $dayofweek . ', ' . $eventDate; ?></p>
        </div>
    </div>
</div>