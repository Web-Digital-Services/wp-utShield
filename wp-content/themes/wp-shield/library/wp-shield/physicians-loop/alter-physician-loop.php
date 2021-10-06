<?php 
function physicians_query_filter($query){
   if ( ! is_admin() && is_post_type_archive( 'physicians-profile' ) && $query->is_main_query() ) {
      $physician_Last_name = types_render_field("last-name"); 
      $query->set( 'orderby', $physician_Last_name );
      $query->set( 'order', 'ASC');
      $query->set( 'posts_per_page', '12');
   }
}
add_action( 'pre_get_posts', 'physicians_query_filter' );