<?php
add_action( 'pre_get_posts', 'foro_adjust_queries' );
function foro_adjust_queries( $query ) {
    if( !is_admin() && $query->is_main_query() && is_home() ) {
        $query->set( 'meta_key', 'foro_event_date' );
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'order', 'ASC' );
    }
}