<?php
/**
 * Building a re-usable archive function
 * This will also add the blocks for content entry guides
 *
 */
function UTH_get_content_entry_guides(){
    if ( is_user_logged_in() ) {
        if ( get_post_type( get_the_ID() ) == 'publications' ) {
            $uth_documentation_url = 'https://uthscsa.teamdynamix.com/TDClient/KB/ArticleDet?ID=74732';
        }elseif ( get_post_type( get_the_ID() ) == 'job' ) {
            $uth_documentation_url = 'https://uthscsa.teamdynamix.com/TDClient/KB/ArticleDet?ID=79132';
        }elseif ( get_post_type( get_the_ID() ) == 'team-member' ) {
            $uth_documentation_url = 'https://uthscsa.teamdynamix.com/TDClient/KB/ArticleDet?ID=79134';
        }elseif ( get_post_type( get_the_ID() ) == 'lab' ) {
            $uth_documentation_url = 'https://uthscsa.teamdynamix.com/TDClient/KB/ArticleDet?ID=79133';
        }elseif ( get_post_type( get_the_ID() ) == 'grant-award' ) {
            $uth_documentation_url = 'https://uthscsa.teamdynamix.com/TDClient/KB/ArticleDet?ID=79130';
        }elseif ( get_post_type( get_the_ID() ) == 'resource' ) {
            $uth_documentation_url = 'https://uthscsa.teamdynamix.com/TDClient/KB/ArticleDet?ID=79135';
        }else{
        }

        $post_type = get_queried_object();
        $uth_content_type_slug = $post_type->rewrite['slug'];
        $uth_content_type_plual_title = esc_html($post_type->labels->name);
        $uth_content_type_singular_title = esc_html($post_type->labels->singular_name);
        //var_dump( $post_type );

        echo '<div class="callout" data-closable>';
        echo '<button class="close-button" aria-label="Close alert" type="button" data-close>';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '<p class="large-text">Content Editing Guide (' . $uth_content_type_plual_title . '):</p>';
        echo '<p><strong>This block is only visible to logged in users</strong></p>';
        echo '<a class="carat-double" href="' . get_site_url() . '/wp-admin/post-new.php?post_type=' . $uth_content_type_slug . '">Add new ' . strtolower($uth_content_type_singular_title) . '</a><br>';
        echo '<a class="carat-double" href="mailto:webteam@uthscsa.edu">Request support</a><br>';
        echo '<br>';
        if (!empty($uth_documentation_url)){
            echo '<a class="button carat-double"  target="_blank" href="' . $uth_documentation_url . '">' . $uth_content_type_plual_title . ' Content Entry Guide</a><br>';
        }
        echo '</div>';
    }
}