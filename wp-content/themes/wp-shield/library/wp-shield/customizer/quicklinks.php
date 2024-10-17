<?php
/** 
 * Display all sidebar items in a quicklinks panel pop out  
 */
function shield_quicklinks_view(){
    //$primary_menu_name = 'uth_primary_quick_links';
    $locations = get_nav_menu_locations();
    $action_root = site_url('');

    echo '<div class="off-canvas position-right" id="offCanvasRight" role="navigation" aria-labelledby="quickLinks" data-off-canvas>';
    echo '<div class="title-bar quicklinks"><div class="title-bar-left">';
    echo '<p><a href="#" data-close="offCanvasRight" aria-expanded="true" aria-controls="offCanvasRight"><i class="fas fa-times"></i> Quicklinks</a></p>';
    echo '<form method="get" class="search" action="' . $action_root . '/">
            <label for="desktop-search" class="element-invisible">Desktop Search</label>
            <input class="search-box" type="search" size="5" name="s" id="desktop-search" placeholder="search" value="" onfocus="if(this.value==this.defaultValue)this.value="";" onblur="if(this.value=="")this.value=this.defaultValue;"/>
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
            <!-- No input close needed -->
        </form>';

    if ( has_nav_menu( 'uth_primary_quick_links' ) ) {
        $primary_menu_id = $locations[ 'uth_primary_quick_links' ] ;
        $primary_quicklinks_menu_object = wp_get_nav_menu_object($primary_menu_id);

        echo '<h4>' . $primary_quicklinks_menu_object->name . '</h4>';
        echo '<div class="no-bullet arrow">';
        uth_primary_quick_links();
        echo '</div>';

        if ( has_nav_menu( 'uth_secondary_quick_links' ) ) {
            $secondary_menu_name = 'uth_secondary_quick_links';
            $secondary_menu_id = $locations[ $secondary_menu_name ] ;
            $secondary_quicklinks_menu_object = wp_get_nav_menu_object($secondary_menu_id);
            echo '<h4>' . $secondary_quicklinks_menu_object->name . '</h4>';
            echo '<div class="no-bullet arrow">';
            uth_secondary_quick_links();
            echo '</div>';
        }
        if ( has_nav_menu( 'uth_third_quick_links' ) ) {
            $third_menu_name = 'uth_third_quick_links';
            $third_menu_id = $locations[ $third_menu_name ] ;
            $third_quicklinks_menu_object = wp_get_nav_menu_object($third_menu_id);
            echo '<h4>' . $third_quicklinks_menu_object->name . '</h4>';
            echo '<div class="no-bullet arrow">';
            uth_third_quick_links();
            echo '</div>';
        }
        if ( has_nav_menu( 'uth_fourth_quick_links' ) ) {
            $fourth_menu_name = 'uth_fourth_quick_links';
            $fourth_menu_id = $locations[ $fourth_menu_name ] ;
            $fourth_quicklinks_menu_object = wp_get_nav_menu_object($fourth_menu_id);
            echo '<h4>' . $fourth_quicklinks_menu_object->name . '</h4>';
            echo '<div class="no-bullet arrow">';
            uth_fourth_quick_links();
            echo '</div>';
        }
        if ( has_nav_menu( 'uth_fifth_quick_links' ) ) {
            $fifth_menu_name = 'uth_fifth_quick_links';
            $fifth_menu_id = $locations[ $fifth_menu_name ] ;
            $fifth_quicklinks_menu_object = wp_get_nav_menu_object($fifth_menu_id);
            echo '<h4>' . $fifth_quicklinks_menu_object->name . '</h4>';
            echo '<div class="no-bullet arrow">';
            uth_fifth_quick_links();
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } 
}

