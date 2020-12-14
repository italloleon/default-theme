<?php
    $video_args = [
        'post_type'			=>		'video',
        'order'				=>		'DESC',
        'orderby'			=>		'date',
        'posts_per_page'	=>		1
        ];
    $video_query = new WP_Query( $video_args );
    if( $video_query->have_posts() ){
        while( $video_query->have_posts() ){
            $video_query->the_post();
            $taxonomias = get_the_terms( get_the_id(), 'tipo' );
            ?>
            <div class="container-fluid lazy-load" data-style="<?php echo get_the_post_thumbnail_url() ?>" id="banner-inicial">
                <div class="container container-banner-inicial">
                    <div class="row mx-0 row-banner-inicial coluna-descricao-banner-inicial">
                        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
                            <div class="bloco-info-post-banner">
                            <div class="abriga-tags">
                                <a class="fonte-site tag-taxonomia" href="<?php echo get_term_link( $taxonomias[0]->term_id, 'tipo' ) ?>" class="tipo-de-video">
                                    <?php echo $taxonomias[0]->name ?>
                                </a>
                                <span class="tag-minutos-video fonte-site">
                                    <?php echo reset(get_post_meta( get_the_id(), 'duracao' )) ?>m
                                </span>
                            </div>
                            <p class="titulo-banner">
                            <?php the_title() ?>
                            </p>
                            <a title="<?php _e('Mais informações do filme ', 'desafio').the_title() ?>" class="botao-mais-informacoes fonte-site" href="<?php the_permalink() ?>"><?php _e('Mais informações','desafio') ?></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6"></div>
                    </div>
                </div>
            </div>
            
            <?php
        }
    }else{
        ?>
        <div class="container-fluid" id="banner-inicial">
                <div class="container container-banner-inicial">
                    <div class="row mx-0 row-banner-inicial">
                        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center coluna-descricao-banner-inicial">
                            <p class="titulos-nao-encontrados"><?php _e('Não foram encontrados vídeos', 'desafio') ?></p>
                            <?php  
                                if(current_user_can('administrator')){
                                    ?>
                                    <a class="link-admin-add-video fonte-site" href="<?php echo admin_url() ?>/post-new.php?post_type=video"><?php _e('Que tal adicionar vídeos agora? Clique aqui', 'desafio') ?></a>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="col-12 col-lg-6"></div>
                    </div>
                </div>
            </div>
        
        <?php
    }
    wp_reset_query();
    wp_reset_postdata();

?>