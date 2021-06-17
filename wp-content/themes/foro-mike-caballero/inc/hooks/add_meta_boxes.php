<?php 
add_action( 'add_meta_boxes', 'foro_metaboxes' ); 

function foro_metaboxes() {

    add_meta_box('foro_event_date', 'Fecha del evento', function( $post ) {

        $eventDate = get_post_meta($post->ID, 'foro_event_date', TRUE);    ?>

            <input type="date" name="foro_event_date" value="<?= ! empty($eventDate) ? $eventDate : ''; ?>" required>

        <?php

    }, ['post'], 'side');

}

add_action('save_post', function( $post_id ) {
    if(isset($_POST['foro_event_date'])) update_post_meta($post_id, 'foro_event_date' , $_POST['foro_event_date']);
}); 