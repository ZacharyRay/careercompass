<?php 


add_theme_support('post-thumbnails');
add_action( 'init', 'create_custom_posttype' );
add_post_type_support( 'jobs', 'thumbnail' );   
function create_custom_posttype() {
    register_post_type(
        'jobs', 
        array(
            'labels' => array(
                'name'               => __( 'Jobs', 'op-theme' ), //Edit
                'singular_name'      => __( 'Job', 'op-theme' ), //Edit	
                'add_new'            => __( 'Add new job', 'op-theme' ),
                'add_new_item'       => __( 'Add new job', 'op-theme' ),
                'edit_item'          => __( 'Rediger', 'op-theme' ),
                'new_item'           => __( 'New', 'op-theme' ),
                'view_item'          => __( 'View', 'op-theme' ),
                'search_items'       => __( 'Search', 'op-theme' ),
                'not_found'          => __( 'Intet fundet', 'op-theme' ),
                'not_found_in_trash' => __( 'Intet fundet i papirkurven', 'op-theme' ),
            ),
           'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields',
                'revisions',
                'excerpt',
              
            ),
            'capability_type' => 'post',
            'rewrite' => array('slug' => 'custom_posttype'), //EDIT
            'menu_position'   => 7,
            'menu_icon' => 'dashicons-admin-page', //https://developer.wordpress.org/resource/dashicons
            'public' => true,
            'show_ui' => true, 
            'show_in_nav_menus' => true,
            'exclude_from_search' => false, 
            'has_archive' => true,            
            'show_in_rest' => false,
            'taxonomies'          => array('Job categories', 'category' ),
        )
    );
}

 
?>