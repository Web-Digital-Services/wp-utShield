<?php

/*  
    For a better understanding of ics requirements and time formats
    please check https://gist.github.com/jakebellacera/635416
*/

// UTILS

// Check if string is a timestamp
function isValidTimeStamp($timestamp) {
    //if($timestamp == '') return;
    return ((string) (int) $timestamp === $timestamp) 
        && ($timestamp <= PHP_INT_MAX)
        && ($timestamp >= ~PHP_INT_MAX);
}

// Escapes a string of characters
function escapeString($string) {
    return preg_replace('/([\,;])/','\\\$1', $string);
}

// Shorten a string to desidered characters lenght - eg. shorter_version($string, 100);
function shorter_version($string, $length) {
if (strlen($string) >= $length) {
        return substr($string, 0, $length);
    } else {
        return $string;
    }
}

// Add a custom endpoint "calendar"
function add_calendar_feed2(){
    add_feed('training-calendar', 'export_ics2');
    // Only uncomment these 2 lines the first time you load this script, to update WP rewrite rules, or in case you see a 404
    global $wp_rewrite;
    $wp_rewrite->flush_rules( false );
}
add_action('init', 'add_calendar_feed2');

// Calendar function
function export_ics2(){

    // Query the event
    $the_event = new WP_Query(array(
        'p' => $_REQUEST['id'],
        'post_type' => 'training-event',
    ));
    
    if($the_event->have_posts()) :
        
        while($the_event->have_posts()) : $the_event->the_post();
    
        // If your version of WP < 5.3.0 use the code below

        /*  The correct date format, for ALL dates is date_i18n('Ymd\THis\Z',time(), true)
            So if your date is not in this format, use that function    */

        $start_date = types_render_field("training-date", array('format'=>'F j, Y g:ia','style'=>'text')); // EDIT THIS WITH YOUR OWN VALUE
        $end_date = types_render_field("training-event-end-time", array('format'=>'F j, Y g:ia','style'=>'text')); // EDIT THIS WITH YOUR OWN VALUE
        if($start_date != '' && !isValidTimeStamp($start_date)) {
            $start_date = strtotime($start_date);
            $start_date = wp_date("Ymd\THis", $start_date);
        }
        if($end_date != '' && !isValidTimeStamp($end_date)) {
            $end_date = strtotime($end_date);
            $end_date = wp_date('Ymd\THis', $end_date);
        } else {
            $end_date = wp_date("Ymd\THis", $start_date + (1 * 60 * 60)); // 1 hour after
        }  
        
        
        // The rest is the same for any version
        $timestamp = date_i18n('Ymd\THis\Z',time(), true);
        $uid = get_the_ID();
        $created_date = get_post_time('Ymd\THis\Z', true, $uid );
        $organiser = get_bloginfo('name'); // EDIT THIS WITH YOUR OWN VALUE
        $address = types_render_field("location"); // EDIT THIS WITH YOUR OWN VALUE
        $url = get_the_permalink();
        $summary = get_the_excerpt();
        $content = html_entity_decode(trim(preg_replace('/\s\s+/', ' ', get_the_content()))); // removes newlines and double spaces
        $title = html_entity_decode(get_the_title());

        //Give the iCal export a filename
        $filename = urlencode( $title.'-ical-' . date('Y-m-d') . '.ics' );
        $eol = "\r\n";

        //Collect output
        ob_start();

        // Set the correct headers for this file
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=".$filename);
        header('Content-type: text/calendar; charset=utf-8');
        header("Pragma: 0");
        header("Expires: 0");

// The below ics structure MUST NOT have spaces before each line
// Credit for the .ics structure goes to https://gist.github.com/jakebellacera/635416
?>
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//<?php echo get_bloginfo('name'); ?> //NONSGML Events //EN
CALSCALE:GREGORIAN
X-WR-CALNAME:<?php echo get_bloginfo('name').$eol;?>
BEGIN:VEVENT
CREATED:<?php echo $created_date.$eol;?>
UID:<?php echo $uid.$eol;?>
DTEND;VALUE=DATE:<?php echo $end_date.$eol; ?>
DTSTART;VALUE=DATE:<?php echo $start_date.$eol; ?>
DTSTAMP:<?php echo $timestamp.$eol; ?>
LOCATION:<?php echo escapeString($address).$eol; ?>
DESCRIPTION:<?php echo $content.$eol; ?>
SUMMARY:<?php echo $title.$eol; ?>
ORGANIZER:<?php echo escapeString($organiser).$eol;?>
URL;VALUE=URI:<?php echo escapeString($url).$eol; ?>
TRANSP:OPAQUE
BEGIN:VALARM
ACTION:DISPLAY
TRIGGER;VALUE=DATE-TIME:
DESCRIPTION:Reminder for <?php echo escapeString(get_the_title()); echo $eol; ?>
END:VALARM
END:VEVENT

<?php
        endwhile;
?>
END:VCALENDAR
<?php
        //Collect output and echo
        $eventsical = ob_get_contents();
        ob_end_clean();
        echo $eventsical;
        exit();

    endif;

}
?>