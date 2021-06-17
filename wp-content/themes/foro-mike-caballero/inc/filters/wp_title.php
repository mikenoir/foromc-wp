<?php
add_filter( 'wp_title', 'foro_wp_title', 10, 2 );
function foro_wp_title( $title, $sep ) {

    if( is_single() ) {
        return "Articulo  $title";
    }
    else {
        return get_bloginfo('name') . "$title";
    }
}