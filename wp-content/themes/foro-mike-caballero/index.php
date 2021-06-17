<?php get_header(); ?>
<div class="container foro-eventos mt-3 mb-5">
    <div class="row"> 
        <div class="col-12 mt-3 mb-3">
            <h2>Proximos Eventos</h2>
        </div>  
        <?php
        while( have_posts() ) {
            the_post();
            $altImage = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); 
            $eventDate = new DateTime( get_post_meta( get_the_ID(), 'foro_event_date', true ) ); ?>
            <div class="col-md-4 col-12">
                <a href="<?php the_permalink();?>">
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?=$altImage;?>">
                    <h3 class="mt-2 mb-2"><?php the_title(); ?></h3>
                    <p class="foro-eventos--date"><?=$eventDate->format('d-m-Y');?></p>
                    <p>
                        <?=has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 18 ); ?>
                    </p>
                </a>
            </div>
            <?php
        } ?>   
    </div>
</div>
<?php get_footer();