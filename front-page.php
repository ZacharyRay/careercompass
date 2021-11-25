<?php get_header(); ?>


<?php 
$info = get_field('info');



?>

<section class="intro-wrapper">
    <div class="intro-wrapper__inner">
        <?= $info; ?>
    </div>
</section>


<section class="compass-wrapper">
        <div class="compass-wrapper__inner">

            <div class="compass-circle">
                <div class="compass-circle__inner">

                    <div class="background-flair"></div>
                    <div class="background-bg-dark"></div>
                    <div class="background-bg-surface"></div>
                    <div class="nsew-img"><img src="http://careercompassa.kinsta.cloud/wp-content/uploads/2021/11/Simple_compass_rose.svg_.png" alt=""></div>
                    <div class="nsew-img-arrow"><!-- <img src="http://localhost:10059/wp-content/uploads/2021/05/compass_needle.png" alt=""> --></div>
                    <div class="level1-wrap show">
                        <div class="level1-wrap-inner">

                        <?php
                        
                        $job_categories_list = get_categories( array(
                            'child_of' => 3
                          ));
                          

                           //var_dump('ti'); 
                        ?>
                            <?php 
                            $i = 0;
                            $category_count = count($job_categories_list);
                            foreach($job_categories_list as $cats) { 
                                $id = $cats->term_id;
                                $placement = get_field('placement', $id);
                                $i++;
                                $cat_name_no_spaces = str_replace(' ', '', $cats->name);
                           
                                ?>
                            <div class="level1-wrap-<?= $i; ?> level-1-settings">
                                <p class="office level1-p"><?= $cats->name; ?></p>
                            </div>
                            <?php }  ?>
                        </div>
                    </div>
                    <?php     
                            $args = array(
                                'post_type' => 'jobs',
                                'post_status' => 'publish',
                                'posts_per_page' => 100,
                                'orderby' => 'title',
                                'order' => 'ASC',
                                //'cat' => $id
                              );?>

                            <p class="back">Back</p>

                            <?php 
                              $query_news_post = new WP_Query( $args );
                              while ( $query_news_post->have_posts() ):
                                $query_news_post->the_post();
                                $the_title = get_the_title();
                                $the_title_no_space = str_replace(' ', '', $the_title);
                                $the_excerpt = get_the_excerpt();
                                $category = get_the_category()[0]->name;
                                $category_name_no_space = str_replace(' ', '', $category);
                                $permalink = get_the_permalink(); 
                            ?>
                            <div class="level2-wrapper <?= $category_name_no_space . '-wrap'; ?>">
                                <p class="modal-click"><?= $the_title; ?></p>
                                <div class="job-content <?= $the_title_no_space . '-infowrap'; ?>">
                                    <div class="job-content-info">
                                        <?= $the_excerpt; ?>
                                        <a href="<?= $permalink; ?>">Read More</a>
                                    </div>
                                    <i class="fas fa-times the-x"></i>
                                </div>
                            </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                </div>
            </div>


        </div>
   </section>



<?php get_template_part('elements/acf', 'flex_fields'); ?>
<?php get_footer(); ?>
