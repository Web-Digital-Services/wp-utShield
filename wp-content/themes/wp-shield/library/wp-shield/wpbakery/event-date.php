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
                'description' => __('Another simple VC box', 'ut-health'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/assets/images/core/shield.png', 
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(   
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'month',
                        'heading' => __( 'Event Month', 'ut-health' ),
                        'param_name' => 'event_month',
                        'description' => __( 'The event month will appear above the numeric day. Usually this will be abbreviated.', 'ut-health' ),
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'day',
                        'heading' => __( 'Event Day', 'ut-health' ),
                        'param_name' => 'event_day',
                        'description' => __( 'The event day will appear below the month.', 'ut-health' ),
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => 'name',
                        'heading' => __( 'Event Title', 'ut-health' ),
                        'param_name' => 'event_title',
                        'description' => __( 'This will appear to the right of the month and day.', 'ut-health' ),
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'class' => 'date',
                        'heading' => __( 'Full date/time or description', 'ut-health' ),
                        'param_name' => 'event_description',
                        'description' => __( 'Full date/time or event description. Example: March 31st, 2023 (8AM CT). This will appear to the right of the month and day.', 'ut-health' ),
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),
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
                    'event_title'   => '',
                    'event_description'   => '',
                ), 
                $atts
            )
        );
        // RENDER THE HTML
        if (!empty($event_month)){
            $event_month_div = ' class="' . $event_month . '"';
        }
        $html = '<div class="event"><div class="date"><div class="month">' . $event_month . '</div><div class="day">' . $event_day . '</div></div><div class="details"><div class="name">' . $event_title . '</div><div class="date">' . $event_description . '</div></div></div>';
         
        return $html;
         
    }
     
} // End Element Class
 
// Element Class Init
new uth_event_date();    