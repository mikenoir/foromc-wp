<?php
add_action( 'after_setup_theme', 'foro_features' );
function foro_features() {
    add_theme_support( 'post-thumbnails' );
    register_nav_menu( 'headerMenuLocation', 'Menu del Header' );
}