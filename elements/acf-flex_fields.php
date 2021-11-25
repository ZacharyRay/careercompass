<?php
// import this into template: get_template_part('elements/acf', 'flex_fields');

if(empty($page_id)){
    $page_id = get_the_ID();
}

if ( ! post_password_required() ) {

    if( have_rows('flex-fields', $page_id) ):
    
        while ( have_rows('flex-fields', $page_id) ) : the_row();
            set_query_var( 'flex-class', get_row_layout() );
            get_template_part('elements/'.get_row_layout());
        endwhile;
    else:
    endif;

}else{
    echo '<section class="password_protection">';
        echo  get_the_password_form();
    echo '</section>';
}

?>