<?php

function illear_enqueue(){
    $uri    =   get_theme_file_uri();
    $ver    =   ILLEAR_DEV_MODE ? time() : true;

    // Registro de estilos e scripts do tema
    wp_register_style( 
        'illear_fonts' ,
        $uri.'/assets/css/fonts/style.min.css',
        [],
        $ver
    );
    wp_register_style( 
        'illear_bootstrap',
        $uri.'/assets/css/bootstrap-grid.min.css',
        [],
        $ver
     );
     wp_register_style( 
        'illear_main_style',
        $uri.'/assets/css/main.css',
        [],
        $ver
     );
     wp_register_style( 
        'illear_video_style',
        $uri.'/assets/css/videos.css',
        [],
        $ver
     );
     wp_register_style( 
        'illear_slick' ,
        'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
        [],
        $ver
    );
    wp_enqueue_script( 'jquery' );

     wp_register_script( 'illear_functions', $uri. '/assets/js/functions.js', [], $ver, true );
     wp_register_script( 'illear_slickjs', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', [], $ver, true );

    



     // Enqueue de estilos e scripts do tema

     wp_enqueue_style( 'illear_fonts' );
     wp_enqueue_style( 'illear_bootstrap' );
     wp_enqueue_style( 'illear_main_style' );
     wp_enqueue_style( 'illear_video_style' );
     wp_enqueue_style( 'illear_slick' );
    //  wp_enqueue_style( 'illear_fontawesome_fonts' );

     wp_enqueue_script( 'illear_functions' );
     wp_enqueue_script( 'illear_slickjs' );
}

function load_admin_scripts( $hook ) {
    global $typenow;
    if( $typenow == 'video' ) {
        wp_enqueue_media();
        
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', get_template_directory_uri().'/assets/js/admin-functions.js', ['jquery'], $ver, true );
        // wp_register_script( 'meta-box-image', $uri.'/assets/js/functions.js', array( 'jquery' ), $ver );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Escolha sua mídia', 'events' ),
                'button' => __( 'Use esta mídia', 'events' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}
