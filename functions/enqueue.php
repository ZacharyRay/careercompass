<?php 
// Add css and js
add_action('wp_enqueue_scripts', 'theme_files');
function theme_files() {

    // filetime for versions
    $themecsspath = get_stylesheet_directory().'/build/style.min.css';
    $themescriptpath = get_stylesheet_directory().'/build/script.min.js';

    $style_ver = filemtime($themecsspath);
    $script_ver = filemtime($themescriptpath);

    //css
    wp_enqueue_style('main_css', get_stylesheet_directory_uri() . '/build/style.min.css', array(), $style_ver, 'all');
    wp_enqueue_style('op-googlefont', 'https://fonts.googleapis.com/css2?family=Archivo:wght@400;600;700;800&display=swap');
    wp_enqueue_style('slickslider', get_stylesheet_directory_uri() . '/assets/lib/slickslider/slick.css', array(), $style_ver, 'all');

    //js
    wp_enqueue_script('main_js', get_stylesheet_directory_uri() . '/build/script.min.js', array('jquery'), $script_ver, true);
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/77dfff5f7d.js', array('jquery'), $script_ver, true);    
    wp_enqueue_script('slickslider', get_stylesheet_directory_uri() . '/assets/lib/slickslider/slick.min.js', array('jquery'), $script_ver, true);

}


?>