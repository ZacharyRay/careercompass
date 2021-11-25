<?php 
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page_header_footer = acf_add_options_page(array(
            'page_title'    => __('Globale indstillinger', 'op-theme'),
            'menu_title'    => __('Globale indstillinger', 'op-theme'),
            'menu_slug'     => 'globale-indstillinger',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'icon_url' => 'dashicons-admin-site-alt'
        ));

    }
};
?>