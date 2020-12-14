<?php

function desafio_setup_theme(){
    
    // Imagem de destaque para posts

    add_theme_support( 'post-thumbnails' );

    // Registro de menu

    register_nav_menu( 'primary', __( 'Primary Menu', 'desafio' ) );

    // Possibilita edição de logo no site

    add_theme_support( 'custom-logo' );

    // Possibilita a alteração de título na área de personalização 

    add_theme_support( 'title-tag' );  


}