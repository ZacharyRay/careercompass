<?php get_header(); ?>

<?php     
    set_query_var( 'page_id', get_option( 'page_for_posts' ));   
    get_template_part('elements/acf', 'flex_fields');
?>

<?php if (have_posts()): ?>
    <section class="post_list">
        <div class="container">
           <?php 
           while (have_posts()) : the_post();
                get_template_part('loop', 'post');
            endwhile;
            ?>
     </div>
    </section>

    <section class="pagination">
        <?= paginate_links(array(
            'next_text'=> '<i class="far fa-angle-right"></i>', 
            'prev_text' => '<i class="far fa-angle-left"></i>' 
        )); ?>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>