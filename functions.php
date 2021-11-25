<?php 
// Enqueue
get_template_part('functions/enqueue');

// add features
get_template_part('functions/features');

// Add custom post types
get_template_part('functions/customposttypes');

// remove admin menus
get_template_part('functions/restrictions');
get_template_part('functions/remove_post'); //remove posts

//options page (ACF is needed)
get_template_part('functions/optionspage');

//Custom functions
get_template_part('functions/shortcodes');
get_template_part('functions/customfunctions');

//Formidable functions
get_template_part('functions/formidable');

// remove Gutenberg
    // add_filter('use_block_editor_for_post', '__return_false', 10);

// Remove the content editor on pages
    add_action('admin_init', 'remove_textarea');
    function remove_textarea() {
        remove_post_type_support( 'page', 'editor' );
        remove_post_type_support( 'post', 'editor' );
    };
