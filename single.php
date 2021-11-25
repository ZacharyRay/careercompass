<?php get_header();?>

<?php if (have_posts()): ?>
<?php while(have_posts()): the_post(); ?>
    <h1><?= the_title(); ?></h1>
<?php endwhile; ?>

<?php get_footer(); ?>