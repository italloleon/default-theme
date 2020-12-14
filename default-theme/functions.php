<?php


// Setup
define( 'ILLEAR_DEV_MODE', true );

//Includes
include( get_theme_file_path('/includes/front/enqueue.php') );
include( get_theme_file_path('/includes/setup.php') );

// Includes Custom posts, taxonomias e metabox

include( get_theme_file_path('/includes/custom-posts/videos/videos.php') );
include( get_theme_file_path('/includes/custom-posts/videos/tipo-video-taxonomia.php') );
include( get_theme_file_path('/includes/custom-posts/videos/video-metaboxes.php') );

// Hooks
add_action( 'wp_enqueue_scripts', 'illear_enqueue' );
add_action( 'after_setup_theme', 'illear_setup_theme' );
add_action( 'init', 'register_taxonomy_tipo' );
add_action( 'init', 'iniciaTaxonomias' );
add_action( 'admin_enqueue_scripts', 'load_admin_scripts', 10, 1 );


// Funções do tema

function geraMenuTaxonomias(){
    $cat_args = array(
        'orderby'       => 'term_id', 
        'order'         => 'ASC',
        'hide_empty'    => false, 
    );
    $terms = get_terms('tipo', $cat_args);
    $menu = "<ul class='lista-menu'>";
    foreach( $terms as $tipo ){
        $nomeTipo = $tipo->name;
        $linkTipo = get_term_link($tipo);
        $menu .= "<li class='fonte-site'> <a title='Página de $nomeTipo' href= '{$linkTipo}'>{$nomeTipo}</a> </li>";
    }
    $menu .= "</ul>";
    return $menu;
}