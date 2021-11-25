<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta <?php bloginfo('charset') ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header"> 
    <div class="header_container">
        <div class="header__logo">
            <?php 
                $img = get_field('firma_logo', 'option');
                if($img):
                    echo '<a href="'.get_bloginfo('url').'" id="logo">'.wp_get_attachment_image( $img, 'full').'</a>';
                endif;
            ?>
        </div>
        <div class="header__menu">
            <?php   wp_nav_menu(array('theme_location' => 'header_menu','menu_class'=> 'menu menu--vertical', 'container' => '')); ?>
        </div>
    </div>
</header>

<div class="content-wrapper">