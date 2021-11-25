<?php 
add_action('after_setup_theme', 'theme_features');
function theme_features() {

    add_theme_support('title-tag');
   
    register_nav_menus(
        array(
            'header_menu'=> __('Header menu', 'op-theme'),
            'footer_menu'=> __('Footer menu', 'op-theme'),
        ) 
    );
   
}

// image sizes
add_action( 'after_setup_theme', 'theme_image_sizes' );
function theme_image_sizes() {
    add_image_size( 'slideshow', 1920 , 830, true ); 
}

?>