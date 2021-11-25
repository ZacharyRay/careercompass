<?php get_header(); ?>

<section class="archive_page">
    <div class="container">
        <h1><?php echo single_term_title();?></h1> 
        <p><?php the_archive_description(); ?></p>
    </div>
</section>

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