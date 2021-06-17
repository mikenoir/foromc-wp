<?php

add_action('admin_head', function(){

    echo '<link rel="shortcut icon" href="' . wp_get_attachment_url( get_option('favicon') ) .'" />';

});