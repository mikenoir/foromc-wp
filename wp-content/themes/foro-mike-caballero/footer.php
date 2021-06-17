<?php 
$footer = get_page_by_path( 'footer' ); ?>
<footer class="container-fluid">
    <?php echo apply_filters( 'the_content', $footer->post_content ); ?>
</footer>
<?php wp_footer(); ?> 
</body>
</html>