<?php

function create_custom_post_video(){
    $labels = array(
        'name'              =>  __('Vídeos', 'desafio'),
        'singular_name'     =>  __('Vídeo', 'desafio'),
        'menu_name'         =>  __('Vídeos', 'desafio'),
        'all_items'         =>  __('Todos os Vídeos', 'desafio'),
        'add_new_item'      =>  __('Adicionar novo Vídeo', 'desafio'),
        'add_new'           =>  __('Adicionar novo', 'desafio'),
        'edit_item'         =>  __('Editar Vídeo', 'desafio'),
        'update_item'       =>  __('Atualizar Vídeo', 'desafio'),

    );
    $args = array(
        'label'             =>  __('Vídeos','desafio'),
        'description'       =>  __('Vídeos','desafio'),
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
        'public'            =>  true,
        'show_ui'           =>  true,
        'show_in_menu'      =>  true,
        'show_in_nav_menus' =>  true,
        'show_in_admin_bar' =>  true,
        'menu_icon'         => 'dashicons-format-video',
        'show_in_rest'      =>  true,
        'labels'            =>  $labels

    );
    
    register_post_type( 'video', $args );
}
add_action( 'init', 'create_custom_post_video');