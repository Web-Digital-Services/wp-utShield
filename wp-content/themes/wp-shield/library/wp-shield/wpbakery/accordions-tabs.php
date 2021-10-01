<?php
/*
Element Description: Tab Element Template used for creating new block types. 
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/
 
// Element Class 
class uth_tab_content extends WPBakeryShortCode {
     
    
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_tab_content_mapping' ), 12 );
        add_shortcode( 'vc_tab_content', array( $this, 'vc_tab_content_html' ) );
    }
    // Element Mapping

    public function vc_tab_content_mapping() {
             
        
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }  
        // Map the block with vc_map()
        vc_map( 
      
            array(
                //This defines how the block appears in the element selection menu. 
                //Define the name and description 
                'name' => __('Accordions & Tabs', 'wp-shield'),
                'base' => 'vc_tab_content',
                'description' => __('Tab or Accordions', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                //That params defines the field types to be used and the settings for eachf field           
                'params' => array(
                    array(
                        'type'       => 'dropdown',
                        'class'      => '',
                        'heading'    => 'Select Display',
                        'description' => 'In order to use this feature, you need to have edit the page on the backend and 
                        add content into the Pill Tabs / Accordion Fields',
                        'param_name' => 'uth_accord_or_pills',
                        'group' => 'Design Options',
                        'value'      => array(
                            'Accordions'  => 'accordions',
                            'Tabs (Floating)'  => 'tabs',
                            'Tabs (Manilla)'  => 'tabs manila',
                            'Tabs (Pill)'  => 'tabs pill'
                            )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'class'      => '',
                            'heading'    => 'Color Options',
                            'description' => esc_html__( 'The Grey color option is only available for Accordions & Tabs (Floating)', 'wp-shield' ),
                            'param_name' => 'color_class',
                            'group' => 'Design Options',
                            'value'      => array(
                                'Default'  => '',
                                'Orange'  => 'orange',
                                'Blue'  => 'blue',
                                'Grey'  => 'grey'
                            )
                        ),
                                           
                )
            )
        );                                
            
    }
    // Element HTML
    public function vc_tab_content_html( $atts, $content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'uth_accord_or_pills'   => '',
                    'color_class'    => ''
                ), 
                $atts
            )
        );
        //Set Default as Pill tabs
        if (empty ($uth_accord_or_pills)){
            $uth_accord_or_pills = 'accordions';
        }

        #Color Selection uses different classes for tabs vs accordions. Fixing Tab classes
        if ($uth_accord_or_pills == 'tabs manila' || $uth_accord_or_pills == 'tabs' || $uth_accord_or_pills == 'tabs pill'){
            if ($color_class == 'orange'){
                $color_class = '';
            }elseif ($color_class == 'blue'){
                $color_class = ' color';
            }elseif ($color_class == 'grey'){
                $color_class = ' color grey';
            }else{
                $color_class == '';
            }
            if ($uth_accord_or_pills == 'tabs manila' || $uth_accord_or_pills == 'tabs pill'  ){
                $tab_manila_color = $color_class;
            }elseif ($uth_accord_or_pills == 'tabs'){
                $tab_float_color = $color_class;
            }else{
                $tab_float_color = ''; 
                $tab_manila_color = '';
            }
        }

        //Start Output buffering for HTML render
        ob_start();

        if ($uth_accord_or_pills == 'tabs manila' || $uth_accord_or_pills == 'tabs' || $uth_accord_or_pills == 'tabs pill'){
            /** PILL Tabs Design */
            echo '<div class="tab-container' . $tab_float_color . '">
            <ul class="' . $uth_accord_or_pills . ' ' . $tab_manila_color . '" data-tabs id="pill-tabs">';
            $i = 0;
            /** TAB TITLES */
            $child_posts = toolset_get_related_posts( get_the_ID(), 'tabs', array( 'query_by_role' => 'parent', 'return' => 'post_id' ) );
            foreach ($child_posts as $child_post){     
                //Load content for each pill tab 
                $tab_title = types_render_field( "tab-title", array( "output" => "normal", "id" => $child_post ));
                $tab_id = 'tab_id_' . $i++;
                
                if ($tab_id == 'tab_id_0'){
                    $active = 'is-active';
                }else{
                    $active = '';
                }

                echo '<li class="tabs-title ' . $active . '">';
                echo '<a href="#' . $tab_id . '">' . $tab_title . '</a>';
                echo '</li>';
            }
            echo '</ul>';

            /** TAB CONTENT */
            echo '<div class="tabs-content" data-tabs-content="pill-tabs">';
            $b = 0;
            $child_posts = toolset_get_related_posts( get_the_ID(), 'tabs', array( 'query_by_role' => 'parent', 'orderby' => 'rfg_order', 'return' => 'post_id' ) );
            foreach ($child_posts as $child_post){     
                //Load content for each pill tab 
                $tab_content = types_render_field( "tab-content", array( "output" => "normal", "id" => $child_post ));
                $tab_id = 'tab_id_' . $b++;
                
                if ($tab_id == 'tab_id_0'){
                    $if_active = ' is-active';
                }else{
                    $if_active = '';
                }

                echo '<div class="tabs-panel' . $if_active . '" id="' . $tab_id . '">';
                echo $tab_content;
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';          
        }else{
            /** ACCORDION Design */
            $html = '<ul class="accordion ' . $color_class . '" data-accordion data-allow-all-closed="true">';
            $c = 0;
            //LOOPS
            $child_posts = toolset_get_related_posts( get_the_ID(), 'tabs', array( 'query_by_role' => 'parent', 'orderby' => 'rfg_order', 'return' => 'post_id' ) );
            foreach ($child_posts as $child_post){     
                //Load content for each pill tab 
                $tab_title = types_render_field( "tab-title", array( "output" => "normal", "id" => $child_post ));
                $tab_content = types_render_field( "tab-content", array( "output" => "normal", "id" => $child_post ));
                $accordion_id = 'accordion_id_' . $c++;
                
                if ($accordion_id == 'accordion_id_0'){
                    $active = 'is-active';
                }else{
                    $active = '';
                }

                $html .= '<li class="accordion-item ' . $active . '" data-accordion-item>';
                $html .= '<a href="#" class="accordion-title">' . $tab_title . '</a>';
                $html .= '<div class="accordion-content" data-tab-content>';
                $html .= '<p>' . $tab_content . '</p>';
                $html .= '</div>';
                $html .= '</li>';

            }

            //END LOOPS
            $html .= '</ul>';
            return $html;
        }
        $output_tabs = ob_get_clean();
        return $output_tabs;
        ob_end_flush();
    }
     
} // End Element Class
 
// Element Class Init
new uth_tab_content();    