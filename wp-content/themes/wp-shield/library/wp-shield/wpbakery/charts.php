<?php
/*
Element Description: Visual chart element
Documentation: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
*/

// Element Class 
class uth_chart extends WPBakeryShortCode {

    // Element Init
    function __construct()
    {
        add_action('init', array($this, 'vc_chart_mapping'), 12);
        add_shortcode('vc_chart', array($this, 'vc_chart_html'));
    }

    // Element Mapping
    public function vc_chart_mapping() {
             
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
        }

        // Map the block with vc_map()
        vc_map(
            array(
                'name' => __('Charts', 'wp-shield'),
                'base' => 'vc_chart',
                'description' => __('Chart to visually represent data', 'wp-shield'), 
                'category' => __('UT Health Designs', 'wp-shield'),   
                'icon' => get_template_directory_uri().'/dist/assets/images/core/shield.png',            
                'params' => array(   
                    // orange/blue color dropdown for div
                    // title option for table header
                    // item percentage in table x5 (helper text to explain percentages to user)
                    // item name in ul x5
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Chart Header', 'wp-shield'),
                        'param_name' => 'chart_header',
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => 'Chart Color',
                        'param_name' => 'chart_color',
                        'description' => esc_html__('Color for the chart.', 'wp-shield'),
                        'value' => array(
                            'Select a color' => '',
                            'Orange' => 'orange',
                            'Blue' => 'blue'
                        )
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => 'Chart Orientation',
                        'param_name' => 'chart_orientation',
                        'description' => esc_html__('Vertical or horizontal direction for the chart.', 'wp-shield'),
                        'value' => array(
                            'Select a direction' => '',
                            'Horizontal' => 'bar',
                            'Vertical' => 'column'
                        )
                    ),
                    //row 1
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Data value for this row', 'wp-shield'),
                        'param_name' => 'data1',
                        'description' => esc_html__('Enter a number from 0-100 for the percent of this row filled.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 1'
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Term for this data below chart', 'wp-shield'),
                        'param_name' => 'legend1',
                        'description' => esc_html__('', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 1'
                    ),
                    //row 2
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Data value for this row', 'wp-shield'),
                        'param_name' => 'data2',
                        'description' => esc_html__('Enter a number from 0-100 for the percent of this row filled.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 2'
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Term for this data below chart', 'wp-shield'),
                        'param_name' => 'legend2',
                        'description' => esc_html__('', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 2'
                    ),
                    //row 3
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Data value for this row', 'wp-shield'),
                        'param_name' => 'data3',
                        'description' => esc_html__('Enter a number from 0-100 for the percent of this row filled.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 3'
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Term for this data below chart', 'wp-shield'),
                        'param_name' => 'legend3',
                        'description' => esc_html__('', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 3'
                    ),
                    //row 4
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Data value for this row', 'wp-shield'),
                        'param_name' => 'data4',
                        'description' => esc_html__('Enter a number from 0-100 for the percent of this row filled.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 4'
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Term for this data below chart', 'wp-shield'),
                        'param_name' => 'legend4',
                        'description' => esc_html__('', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 4'
                    ),
                    //row 5
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Data value for this row', 'wp-shield'),
                        'param_name' => 'data5',
                        'description' => esc_html__('Enter a number from 0-100 for the percent of this row filled.', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 5'
                    ),
                    array(
                        'type' => 'textfield',
                        'holder' => '',
                        'heading' => __('Term for this data below chart', 'wp-shield'),
                        'param_name' => 'legend5',
                        'description' => esc_html__('', 'wp-shield'),
                        'value' => __('', 'wp-shield'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Row Data 5'
                    ),

                )
            )
        );
           
    }

    // Element HTML
    public function vc_chart_html( $atts ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'chart_header' => '', 
                    'chart_color' => '',
                    'chart_orientation' => '',
                    'data1' => '',
                    'data2' => '',
                    'data3' => '',
                    'data4' => '',
                    'data5' => '',
                    'legend1' => '',
                    'legend2' => '',
                    'legend3' => '',
                    'legend4' => '',
                    'legend5' => ''
                ), 

                $atts
            )
        );

        // variable for chart color, default is orange
        $color = $chart_color == 'blue' ? 'blue' : 'orange'; 

        // variable for chart orientation, default is horizontal
        $orientation = $chart_orientation == 'column' ? 'column' : 'bar'; 

        // Allow empty table elements, maximum of 5 if data exists
        $row1 = '';
        $legend_item1 = '';
        if (!empty($data1) && !empty($legend1)) {
            $row1 = '<tr><td style="--size: calc( '. $data1 .' / 100 )"><span class="data">0</span></td></tr>';
            $legend_item1 = '<li> ' . $legend1 . ' </li>';
        }
        
        $row2 = '';
        $legend_item2 = '';
        if (!empty($data2) && !empty($legend2)) {
            $row2 = '<tr style="background-color: transparent;"><td style="--size: calc( '. $data2 .' / 100 )"><span class="data">0</span></td></tr>';
            $legend_item2 = '<li> ' . $legend2 . ' </li>';
        }

        $row3 = '';
        $legend_item3 = '';
        if (!empty($data3) && !empty($legend3)) {
            $row3 = '<tr><td style="--size: calc( '. $data3 .' / 100 )"><span class="data">0</span></td></tr>';
            $legend_item3 = '<li> ' . $legend3 . ' </li>';
        }

        $row4 = '';
        $legend_item4 = '';
        if (!empty($data4) && !empty($legend4)) {
            $row4 = '<tr style="background-color: transparent;"><td style="--size: calc( '. $data4 .' / 100 )"><span class="data">0</span></td></tr>';
            $legend_item4 = '<li> ' . $legend4 . ' </li>';
        }

        $row5 = '';
        $legend_item5 = '';
        if (!empty($data5) && !empty($legend5)) {
            $row5 = '<tr><td style="--size: calc( '. $data5 .' / 100 )"><span class="data">0</span></td></tr>';
            $legend_item5 = '<li> ' . $legend5 . ' </li>';
        }


        // Fill $html var with data
        $html = '
        <div class="grid-x align-center">
            <div class="large-6 medium-8 small-12">
                <div class=" ' . $color . ' ">
                    <table class="charts-css hide-data show-heading data-spacing-5 ' . $orientation . '">
                        <caption>' . $chart_header . '</caption>
                        <tbody>
                            ' . $row1 . '
                            ' . $row2 . '
                            ' . $row3 . '
                            ' . $row4 . '
                            ' . $row5 . '
                        </tbody>
                    </table>
                    <ul class="charts-css legend legend-inline legend-square">
                        ' . $legend_item1 . '
                        ' . $legend_item2 . '
                        ' . $legend_item3 . '
                        ' . $legend_item4 . '
                        ' . $legend_item5 . '
                    </ul>
                </div>
            </div>
        </div>'
        ;

        return $html;
    }
}

//Element Class Init
new uth_chart();

