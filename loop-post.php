<?php 
// use this loop in template: get_template_part('loop', 'post');
?>
<div class="loop loop-post-item">
    <a class="loop_wrapper" href="<?php the_permalink(); ?>">
        <div class="loop-content">
            <div class="dato"><?= get_the_date('d.m.Y'); ?></div>
            <div class="titel"><?= get_the_title(); ?></div>
        </div>
    </a>
</div>