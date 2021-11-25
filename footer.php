</div><!-- end .content-wrapper-->

<footer class="footer">

    <div class="footer_container">
   
        <div class="footer__1">

            <?php echo do_shortcode('[firma_navn]'); ?></br>
            <address>
                <?php echo do_shortcode('[firma_adresse]'); ?><br>
                <?php echo do_shortcode('[firma_postnr]'); ?> <?php echo do_shortcode('[firma_by]'); ?><br><br>
            </address>
            <?php echo do_shortcode('[firma_email]'); ?><br>
            <?php echo do_shortcode('[firma_telefon]'); ?>

        </div>

        <div class="footer__2">
            <?php //menu navn
                $location_name = 'footer_menu';
                $theme_locations = get_nav_menu_locations();
                $menu_obj = get_term( $theme_locations[$location_name], 'nav_menu' ); 
                if(isset($menu_obj->name)):
                    echo '<div class="h5">'.$menu_obj->name.'</div>';
                    wp_nav_menu( array( 'theme_location' => $location_name, 'fallback_cb' => false, 'depth' => 1 ) ); 
                endif;
            ?>
        </div>

        <div class="footer__3">
            <div class="some_heading h5"><?= __('SOME', 'op-theme')?></div>
            <?php echo do_shortcode('[firma_some]'); ?>       
        </div>
 
    </div>

</footer>

<?php wp_footer(); ?>

</body>

</html>