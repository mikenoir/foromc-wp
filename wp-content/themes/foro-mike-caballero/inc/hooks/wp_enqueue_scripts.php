<?php
add_action( 'wp_enqueue_scripts', 'foro_files' );
function foro_files() {
    //Fonts
    //Style
    wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'main_styles', get_stylesheet_uri() );
    //JS
    wp_enqueue_script( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', ['jquery'], false, true );
}