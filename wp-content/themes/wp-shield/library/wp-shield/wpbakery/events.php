<?php
/*
Element Description: Events Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_events_block extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_events_block_mapping' ), 12 );
        add_shortcode( 'vc_events_block', array( $this, 'vc_events_block_html' ) );
    }
    // Element Mapping

    public function vc_events_block_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Events Feed', 'ut-health'),
                'base' => 'vc_events_block',
                'description' => __('Load WordPress Events', 'ut-health'), 
                'category' => __('UT Health Designs', 'ut-health'),   
                'icon' => get_template_directory_uri().'/assets/images/core/shield.png', 
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Events Title', 'ut-health' ),
                        'param_name' => 'feed_title',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Settings',
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Events Per Page', 'ut-health' ),
                        'param_name' => 'events_per_page',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Settings',
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'All Evens URL Page', 'ut-health' ),
                        'param_name' => 'all_events_link',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Settings',
                    ),
                    // Dropwdown Field
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Design Options',
                        'param_name' => 'design_options',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Please select a color'  => 'list_view',
                            'List view (Basic Pages)'  => 'list_view',
                            'White Cards (Colorized Background Row)'  => 'colorized',
                            'Sidebar Callout'  => 'sidebar',
                            'Vertical Row'  => 'vertical',
                        )
                    ),
                    //Check box   
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Show Past Events', 'ut-health' ),
                        'param_name' => 'load_past_events',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Settings',
                    ),
                    //Check box   
                    array(
                        'type' => 'checkbox',
                        'holder' => '',
                        'heading' => __( 'Enable Pagintaion', 'ut-health' ),
                        'param_name' => 'enable_pagination',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Settings',
                    ),
                    //Single line text field. 
                    array(
                        'type' => 'textfield',
                        'holder' => 'div',
                        'heading' => __( 'Filter Term Group', 'ut-health' ),
                        'param_name' => 'taxonomy_term_group',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Filter Options',
                    ),
                    array(
                        //Single Line Text Field Type
                        'type' => 'textfield',
                        'holder' => 'h2',
                        'class' => 'text-class',
                        'heading' => __( 'Filter Term Name', 'ut-health' ),
                        'param_name' => 'taxonomy_term_name',
                        'value' => __( '', 'ut-health' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Filter Options',
                    ),                       
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_events_block_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'feed_title'   => '',
                    'events_per_page'   => '',
                    'enable_pagination' => '',
                    'design_options' => '',
                    'load_past_events' => '',
                    'taxonomy_term_group' => '',
                    'taxonomy_term_name' => '',
                    'all_events_link' => ''
                ), 
                $atts
            )
        );
        
        if(empty($all_events_link)){
            $all_events_link = 'events/';
        }

        $todays_date = date('Y-m-d',strtotime("today"));
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        //$timeFilter = 'past';
        if (empty($load_past_events) || $load_past_events == 'false'){
            //Show Future Events
            $PastOrPresent = '>=';
            $sortBy_Asc_Desc = 'ASC';
        }else{
            //Show Past Events
            $PastOrPresent = '<=';
            $sortBy_Asc_Desc = 'Desc';
        }
        /** Load Design Options **/
        if ($design_options == 'list_view' || empty($design_options)){
            $wrapper_opening_class = '<ul class="loose-list line-delimited">';
            $template_part = "template-parts/content-types/events/cards/single-event-list";
            $wrapper_closing_class = '</ul">';
        }elseif($design_options == 'colorized'){
            $wrapper_opening_class = '<div class="row bleed colorized colorized-theme roomy" data-equalizer><h2 class="text-center">' . $feed_title . '</h2>';
            $template_part = "template-parts/content-types/events/cards/single-event-card";
            $wrapper_closing_class = '</div>';
        }elseif($design_options == 'vertical'){
            $wrapper_opening_class = '<div><div class="cell small-12 medium-12 large-12 text-center"><h2 class="margin-bottom">' . $feed_title . '</h2>
            <div class="grid-x grid-margin-x text-left margin-bottom">';
            $template_part = "template-parts/events/vertical-row";
            $wrapper_closing_class = '</div><p><a class="button carat-double" href="' . $all_events_link . '">View upcoming events</a></p></div>';
        }elseif($design_options == 'sidebar'){
            $wrapper_opening_class = '<h2 class="page-header text-center close">' . $feed_title . '</h2><div class="panel"><ul class="loose-list line-delimited">';
            $template_part = "template-parts/content-types/events/cards/single-event-sidebar";
            $wrapper_closing_class = '</ul><p class="text-center"><a class="button carat-double" href="' . get_site_url() . '/' . $all_events_link . '">View upcoming events</a></p></div>';
        }
        $tax = ['tax_query' => array(  
                    array(
                    'taxonomy' => $taxonomy_term_group,
                    'field'    => 'slug',
                    'terms'    => $taxonomy_term_name,
                )
            ),];
            $main_event_args = array(
                'post_type' => 'events',
                'posts_per_page' => $events_per_page,
                'paged' => $paged,
                //meta_key: Loads the event date field that is in YYYY-MM-DD format.
                //orderby: Sorts by the meta_key value you declared. Loads the database key
                //meta_type: Tells the loop what type of meta_key you are using. 
                //Switched from DATE to DATETIME Specifically updated for Neurosurgery to sort conference room reservations. 
                'meta_key'  => 'event-alt-date',
                'orderby'	=> 'meta_value',
                'meta_type' => 'DATETIME',
                //Meta_query: Compare the event-alt-date to todays date to see if we are loading past or future events based on todays date. 
                'meta_query' => array(
                    array(
                        'key' => 'event-alt-date',
                        'value' => $todays_date,
                        'compare' => $PastOrPresent,
                        'type' => 'DATE'
                    )
                ),
                'order'		=> $sortBy_Asc_Desc,
        );
                
            
        if ( isset( $atts[ 'taxonomy_term_group' ], $atts[ 'taxonomy_term_name' ] ) ) {
            $main_event_args = array_merge($main_event_args, $tax);
        }
    
         
        $ut_events_query = new WP_Query( $main_event_args );
        ob_start();
    
        /** Opening Wrapper Classes **/
        if (!empty($wrapper_opening_class)){echo $wrapper_opening_class;}
        
        /** Start the Loop **/
        if ( $ut_events_query->have_posts() ) :  while ( $ut_events_query->have_posts() ) : $ut_events_query->the_post();
            /** Load the loop template design **/
            if (!empty($template_part)){
                get_template_part( $template_part, get_post_format() );
                //echo 'loop';
            }else{
                echo 'design error';
            }
            // End the Loop
            endwhile;
    
            /** Closing Wrapper Classes **/
            if (!empty($wrapper_closing_class)){echo $wrapper_closing_class;}
            /** Pagination **/
            if ($enable_pagination == 'enabled'){
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $ut_events_query->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'add_args'     => false,
                    'add_fragment' => '',
                ) );
                }else{
                    //do nothing
                }	
        else:
            // If no posts match this query, output this text in black.
        ?>	<p class="text-center black-text">
                <?php echo pl__('There are no events at this time. Please check back later.'); ?> 
            </p>	
            <?php 
        endif;
        $output_string = ob_get_contents();
        ob_end_clean();
        wp_reset_postdata();
        return $output_string;	
    }
     
} // End Element Class
 
// Element Class Init
new uth_events_block();    