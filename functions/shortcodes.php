<?php
add_shortcode('firma_navn', 'firma_navn');
function firma_navn(){
    return '<span class="firma_navn h5">'.get_field('firma_navn', 'options').'</span>';
}

add_shortcode('firma_adresse', 'firma_adresse');
function firma_adresse(){
    return '<span class="firma_adresse">'. get_field('firma_adresse', 'options').'</span>';
}

add_shortcode('firma_postnr', 'firma_postnr');
function firma_postnr(){
    return '<span class="firma_postnr">'. get_field('firma_postnr', 'options').'</span>';
}

add_shortcode('firma_by', 'firma_by');
function firma_by(){
    return '<span class="firma_by">'.get_field('firma_by', 'options').'</span>';
}

add_shortcode('firma_email', 'firma_email');
function firma_email(){
    return '<span class="firma_email">'.apply_filters('op_email', get_field('firma_mail', 'options')).'</span>';
}

add_shortcode('firma_telefon', 'firma_telefon');
function firma_telefon(){
    return '<span class="firma_telefon">'.apply_filters('op_telefon', get_field('firma_telefon', 'options')).'</span>';
}

add_shortcode('privatlivspolitik', 'privatlivspolitik');
function privatlivspolitik(){
    return '<a class="privatlivspolitik" href="'.get_privacy_policy_url().'" target="_blank">'.__('privatlivspolitik', 'op-theme').'</a>';
}

add_shortcode( 'firma_some', 'firma_some' );
function firma_some(){
 
    echo '<div class="firma_some">';
    $facebook = get_field('some_facebook', 'options');
    if($facebook):
        echo '<a href="'.$facebook.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
    endif;
 
    $linkedin = get_field('some_linkedin', 'options');
    if($linkedin):
        echo '<a href="'.$linkedin.'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
    endif;
 
    $youtube = get_field('some_youtube', 'options');
    if($youtube):
        echo '<a href="'.$youtube.'" target="_blank"><i class="fab fa-youtube"></i></a>';
    endif;
 
    $instagram = get_field('some_instagram', 'options');
    if($instagram):
        echo '<a href="'.$instagram.'" target="_blank"><i class="fab fa-instagram"></i></a>';
    endif;
    echo '</div>';
}