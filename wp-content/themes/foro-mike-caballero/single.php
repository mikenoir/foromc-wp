<?php 
get_header(); 
while( have_posts() ) {
    the_post();
    $altImage = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
    $eventDate = new DateTime( get_post_meta( get_the_ID(), 'foro_event_date', true ) ); ?>

    <div class="container single-event">
        <h1><?php the_title();?></h1>
        <img src="<?php the_post_thumbnail_url('full');?>" alt="<?=$altImage;?>">
        <p class="foro-eventos--date"><?=$eventDate->format('d-m-Y');?></p>
        <?php the_content(); ?>
    </div>
    <?php
}  

get_footer('single'); 