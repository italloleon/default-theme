<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
<nav class="container-fluid" id="navegacao-principal">
    <div class="container">
        <div class="row mx-0">
            <div class="col-2">
            <a href="<?php echo site_url() ?>" class="link-logo">
                <figure>
                    <?php 

                    // Verifica se existe uma logo cadastrada no site e exibe, caso contrário puxa uma imagem do próprio tema

                    if(has_custom_logo()){
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image_logo = wp_get_attachment_image_src( $custom_logo_id , 'thumbnail' );
                        ?>
                        <img data-src="<?php echo $image_logo[0] ?>" data-src-mobile="<?php echo $image_logo[0] ?>" alt="Logo do Site">
                        <?php
                    }else{
                        ?>
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/logo-play.svg" alt="Logo do Site">
                        <?php
                    }
                    ?>
                </figure>
            </a>
            </div>
        <div class="col-10 d-flex align-items-center justify-content-end">
        
        <?php
        // Echo de uma função de functions.php que retorna uma meno de taxonomias
        echo geraMenutaxonomias() 
        ?>
        </div>
    </div>
    </div>
</nav>

