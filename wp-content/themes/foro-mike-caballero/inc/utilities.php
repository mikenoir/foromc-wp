<?php

function get_attachment_info( $attachmentID, $size = 'large' ) {

    $attachment = get_post( $attachmentID );

    return [          
        'ID'            => $attachment->ID,  
        'alt'           => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption'       => $attachment->post_excerpt,
        'description'   => $attachment->post_content,
        'href'          => get_permalink( $attachment->ID ),
        'title'         => $attachment->post_title,
        'url'           => wp_get_attachment_url($attachment->ID, $size)
    ];
}