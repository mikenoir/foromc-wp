<?php 
add_action('admin_enqueue_scripts', function() {
    $time = time();
    if( is_admin() ) wp_enqueue_media();
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.0/css/all.css');
    wp_enqueue_style('admin_styles', get_theme_file_uri('/css/admin/admin.css') . '?v=' . $time);
    wp_enqueue_script('admin_js',get_theme_file_uri('/js/admin/admin.js') . '?v=' . $time, ['jquery'], '1.0', true );
}); 