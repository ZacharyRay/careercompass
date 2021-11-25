<?php

// Remove admin menu
add_action( 'admin_menu', 'remove_default_post_type' );
function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

//prevent url access: http://boilerplate.local/wp-admin/edit.php
add_action( 'current_screen', 'op_restrict_posts_page' );
function op_restrict_posts_page(){
    if ( is_admin() ) {
        $screen = get_current_screen();
        $restricted_pages = array(
            'edit-post',
        );
        if( in_array($screen->id, $restricted_pages) ) {
            wp_die( __( 'You do not have sufficient permissions to access this page.', 'op-theme' ) );
        }
    }
}

// Remove add New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );
function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );
function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// End remove post type

?>