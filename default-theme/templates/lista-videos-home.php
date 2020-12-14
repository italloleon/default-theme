<section class="container sessao-taxonomia" id="sessao-documentarios">
    <a title="<?php _e('Link para a página de vídeos do tipo ') ?><?php echo get_term_by( 'slug', reset($args), 'tipo')->name ?>" href="<?php echo get_term_link( get_term_by( 'slug', reset($args), 'tipo')->term_id, 'tipo' ) ?>" class="fonte-site titulo-sessao-taxonomia">
        <?php echo get_term_by( 'slug', reset($args), 'tipo')->name ?>
    </a>
    <div class="abriga-slider">
            <?php
             $documentario_args = [
                'post_type'			=>		'video',
                'order'				=>		'DESC',
                'orderby'			=>		'date',
                'posts_per_page'	=>		8,
                'tax_query'         =>      array(
                    array(
                        'taxonomy' => 'tipo',
                        'field'    => 'slug',
                        'terms'    => [reset($args)],
                    ),
                ),
                ];
            $documentario_query = new WP_Query( $documentario_args );
            if($documentario_query->have_posts()){
                ?>
                <div class="slider-<?php echo reset($args) ?>">
                    <?php
                        while($documentario_query->have_posts()){
                            $documentario_query->the_post();
                            if( has_post_thumbnail( get_the_id() ) ){
                                $url_imagem = get_the_post_thumbnail_url();
                            }elseif( get_post_meta( get_the_id(), 'imagem_exibicao' ) != '' ){
                                $url_imagem = get_post_meta( get_the_id(), 'imagem_exibicao' );
                            }
                            else{
                                $url_imagem = '';
                            }
                            ?>
                            <a href="<?php the_permalink( get_the_id() ) ?>" class="abriga-video">
                                <div class="imagem-exposicao lazy-load" data-style="<?php echo $url_imagem ?>" ></div>
                                <span class="tag-taxonomia fonte-site" >
                                <?php echo reset(get_post_meta( get_the_id(), 'duracao' )) ?>m
                                </span>
                            </a>
                            <?php
                        }
                    ?>
                </div>
                <?php
            }else{
                echo 'Nao foram encontrados documentários';
            }
            
            ?>
        </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        jQuery('.slider-<?php echo reset($args) ?>').slick({
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 2,
            variableWidth: true,
        });
    })
</script>