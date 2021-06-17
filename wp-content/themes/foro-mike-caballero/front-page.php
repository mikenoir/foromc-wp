<?php 
get_header(); 
while( have_posts() ) {
    the_post();

    $gallery = get_post_gallery( false, false );
    $gallery = explode( ',', $gallery['ids'] );  ?>
    <section class="container-fluid foro-gallery p-0 m-0">
        <div id="foro_carousel" class="carousel carousel-white slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                for( $i = 0; $i < count( $gallery ); $i++ ) {
                    $image = get_attachment_info( $gallery[$i] );
                    $active = $i == 0 ? 'active' : ''; ?>
                    <div class="carousel-item <?=$active;?>" data-bs-interval="10000">
                        <img src="<?=$image['url'];?>" class="d-block w-100" alt="<?=$image['alt'];?>">
                        <div class="carousel-caption d-none d-md-block">
                            <?=apply_filters( 'the_content', $image['description'] );?>
                            <div class="mt-3 mb-2">
                                <a href="<?=get_post_type_archive_link( 'post' );?>">
                                    <button type="button" class="btn btn-light">Ver Eventos</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#foro_carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#foro_carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="container mt-3 foro-description">
        <?php echo apply_filters( 'the_content', strip_shortcodes( get_the_content() )); ?>
    </section>
    <?php
} 

wp_reset_postdata();

$today = date('Ymd');
$events = new WP_Query([
    'post_type'         => 'post',
    'posts_per_page'    => 3,
    'post_status'       => 'publish',
    'orderby'           => 'meta_value',
    'meta_key'          => 'foro_event_date',
    'order'             => 'ASC'
]);  ?>

<div class="container foro-eventos mt-3 mb-5">
    <div class="row"> 
        <div class="col-12 mt-3 mb-3">
            <h2>Proximos Eventos</h2>
        </div>  
        <?php
        while( $events->have_posts() ) {
            $events->the_post();
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