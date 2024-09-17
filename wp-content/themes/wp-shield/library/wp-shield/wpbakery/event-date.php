<?php
/*
Element Description: Event Date block type
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_event_date extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_event_date_mapping' ), 12 );
        add_shortcode( 'vc_event_date', array( $this, 'vc_event_date_html' ) );
    }
    // Element Mapping

    public function vc_event_date_mapping() {       
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Event Date', 'wp-shield'),
                'base' => 'vc_event_date',
                'description' => __('Creates a Date callout for an event', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',        
                'params' => array(   
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'month',
                        'heading' => __( 'Event Month', 'wp-shield' ),
                        'param_name' => 'event_month',
                        'description' => __( 'The event month will appear above the numeric day. Usually this will be abbreviated.', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'day',
                        'heading' => __( 'Event Day', 'wp-shield' ),
                        'param_name' => 'event_day',
                        'description' => __( 'The day for the event.', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'day',
                        'heading' => __( 'Event Day 2', 'wp-shield' ),
                        'param_name' => 'event_day2',
                        'description' => __( 'Only add second day for a Multi-Day Event', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'name',
                        'heading' => __( 'Event Title', 'wp-shield' ),
                        'param_name' => 'event_title',
                        'description' => __( 'This will appear to the right of the month and day.', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'class' => 'date',
                        'heading' => __( 'Full date/time or description', 'wp-shield' ),
                        'param_name' => 'event_description',
                        'description' => __( 'Full date/time or event description. Example: March 31st, 2023 (8AM CT). This will appear to the right of the month and day.', 'wp-shield' ),
                        'value' => __( '', 'wp-shield' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content'
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => __('URL', 'wp-shield'),
                        'param_name' => 'url',
                        'dependency' => array(
                            'element' => 'link',
                            'value' => __('Place Link Here', 'wp-shield'),
                        ),
                        'description' => __('Link will only show up for Long Event and Interactive Event', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => 'Event Date Style',
                        'param_name' => 'date_style',
                        'value' => array(
                            'Select a style' => '',
                            'Long Event' => 'Long',
                            'Interactive Datebox' => 'Inter',
                            'Grey Datebox' => 'Grey',
                            'Blue Datebox' => 'Blue',
                            'Multi-Day Datebox' => 'Multi'
                        ),
                        'group' => 'Design Options',
                    )
                )
            )
        );                                
            
    }

    // Element HTML
    public function vc_event_date_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'event_month' => '',
                    'event_day'   => '',
                    'event_day2'   => '',
                    'event_title'   => '',
                    'event_description'   => '',
                    'url' => '',
                    'date_style' => ''
                ), 
                $atts
            )
        );

        // Build link
        if (!empty($url)) {
            $link = vc_build_link($url);
            $href = $link['url'];
            $title = !empty($link['title']) ? $link['title'] : '';
            $url = '<a href="' . $href . '" title="' . $title . '"></a>';
        } else {
            $url = '';
        }

        // Logic to alter styling of event date based on dropdown value
        $date_output = '';

        switch($date_style) {
            case 'Long' :
                $url = '<a href="' . $href . '" title="' . $title . '" class="event long">';
                $date_output = '                    
                    ' . $url . '
                        <div class="date">
                            <div class="month">' . $event_month . '</div>
                            <div class="day">' . $event_day . '</div>
                        </div>
                        <div class="details">
                            <p class="name">' . $event_title .'</p>
                        </div>
                        <div class="arrow"></div>
                    </a>';
                break;
            case 'Inter' :
                $url = '<a href="' . $href . '" title="' . $title . '">';
                $month_substring = substr($event_month, 0, 3);
                $date_output = '
                    ' . $url . '
                        <div class="datebox">
                            <div class="month">' . $month_substring . '</div>
                            <div class="day">' . $event_day . '</div>
                        </div>
                    </a>
                ';
                break;
            case 'Grey' :
                $month_substring = substr($event_month, 0, 3);
                $date_output = '
                    <div class="datebox">
                        <div class="month">' . $month_substring . '</div>
                        <div class="day">' . $event_day . '</div>
                    </div>
                ';
                break;
            case 'Blue' :
                $month_substring = substr($event_month, 0, 3);
                $date_output = '
                    <div class="datebox blue">
                        <div class="month">' . $month_substring . '</div>
                        <div class="day">' . $event_day . '</div>
                    </div>
                ';
                break;
            case 'Multi' :
                $month_substring = substr($event_month, 0, 3);
                $multi_day = $event_day . "-" . $event_day2;
                $date_output = '
                    <div class="datebox">
                        <div class="month">' . $month_substring . '</div>
                        <div class="day multi">' . $multi_day . '</div>
                    </div>
                ';
                break;
            default :
                $date_output = '
                    <div class="event">
                        <div class="date">
                            <div class="month">' . $event_month . '</div>
                            <div class="day">' . $event_day . '</div>
                        </div>
                        <div class="details">
                            <div class="name">' . $event_title . '</div>
                            <div class="date">' . $event_description . '</div>
                        </div>
                    </div>
                ';
            break;    
        }

        // RENDER THE HTML
        $html = $date_output;
         
        return $html;
    }
     
} // End Element Class
 
// Element Class Init
new uth_event_date();    