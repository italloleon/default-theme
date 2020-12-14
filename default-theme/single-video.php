<?php  get_header()?>
<?php
    $id_post = get_the_id();
    $url_embed = reset(get_post_meta( $id_post, 'embed' ));
    $id_embed = explode('=', $url_embed)[1];
    $taxonomias = get_the_terms( get_the_id(), 'tipo' );

?>
<div class="container" id="abriga-info-video">
    <div class="row mx-0 justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="abriga-tags">
                <a class="fonte-site tag-taxonomia" href="<?php echo get_term_link( $taxonomias[0]->term_id, 'tipo' ) ?>" class="tipo-de-video">
                    <?php echo $taxonomias[0]->name ?>
                </a>
                <span class="tag-minutos-video fonte-site">
                    <?php echo reset(get_post_meta( get_the_id(), 'duracao' )) ?>m
                </span>
            </div>
            <h1><?php the_title() ?></h1>
        </div>
    </div>
    <iframe  src="https://www.youtube.com/embed/<?php echo $id_embed ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class="row mx-0 justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="conteudo-sinopse">
                <?php the_content() ?>
            </div>
        </div>
    </div>
</div>




<?php  get_footer()?>