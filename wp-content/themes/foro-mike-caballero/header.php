<!DOCTYPE html>
<html <?= language_attributes(); ?>>
<head>
    <meta charset="<?= bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?=get_option('metaKeyWords');?>">
    <title><?php wp_title('-', true, 'left'); ?></title>
    <link rel="shortcut icon" href="<?=wp_get_attachment_url( get_option('favicon') );?>" type="image/x-icon">

    <?php 
    if( ! is_single() ) {
        $description = get_bloginfo('description');
        $title = get_bloginfo('name');
        $shareImage = wp_get_attachment_url( get_option('shareImage') );
    } else {
        global $post;
        $description = has_excerpt( $post->ID ) ? get_the_excerpt( $post->ID ) : wp_trim_words( get_the_content( $post->ID ), 18 ); 
        $title = $post->post_title;
        $shareImage = get_the_post_thumbnail_url( $post->ID, 'medium' );
    } ?>

	<meta name="description" content="<?=$description; ?>">
	<meta name="DC.title" lang="<?=language_attributes(); ?>" content="<?=$title; ?>" />
	<meta name="DC.description" lang="<?=language_attributes(); ?>" content="<?=$description; ?>" />
	<meta name="DC.creator" content="<?=get_bloginfo('name'); ?>" />
	<meta name="DC.language" content="<?=language_attributes(); ?>" />
	<meta property="og:title" content="<?=$title; ?>"/>
	<meta property="og:description" content="<?=$description; ?>"/>
	<meta property="og:image" content="<?=$shareImage; ?>"/>
	<meta property="og:image:width" content="300"/>
	<meta property="og:image:height" content="200"/>
	<meta property="og:url" content="<?=home_url();?>" />
	<meta property="og:site_name" content="<?=get_bloginfo('name'); ?>"/>
	<meta property="og:type" content="website"/>
	<link rel="canonical" href="<?=home_url();?>" />

    <?php 
    wp_head();  
    if( !empty( get_option('googleTagManager') ) ) echo get_option( 'googleTagManager' ); ?>
</head>
<body <?= body_class(); ?>>
    <nav class="navbar navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?=site_url();?>">
                <?=bloginfo('name');?>
            </a>
            <?php 
            wp_nav_menu([
                'theme_location'    => 'headerMenuLocation',
                'menu_class'        => 'nav justify-content-end',
                'container'         => false,
                'menu_id'           => 'menu_style'
            ]); ?>
        </div>
    </nav>