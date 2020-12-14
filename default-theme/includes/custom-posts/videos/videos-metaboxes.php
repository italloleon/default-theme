<?php

abstract class DesafioVideos_Meta_Box {
 
 
  
    public static function add() {
        $screens = [ 'video', 'wporg_cpt' ];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'video_box_id',          // Unique ID
                __('Detalhes do vídeo', 'desafio'), // Box title
                [ self::class, 'html' ],   // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }
 
 
    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public static function save( int $post_id ) {
        if ( array_key_exists( 'duracao', $_POST ) ) {
            update_post_meta(
                $post_id,
                'duracao',
                $_POST['duracao']
            );
        }
        if ( array_key_exists( 'embed', $_POST ) ) {
            update_post_meta(
                $post_id,
                'embed',
                $_POST['embed']
            );
        }
        if ( array_key_exists( 'descricao', $_POST ) ) {
            update_post_meta(
                $post_id,
                'descricao',
                $_POST['descricao']
            );
        }
        if ( array_key_exists( 'imagem_exibicao', $_POST ) ) {
            update_post_meta(
                $post_id,
                'imagem_exibicao',
                $_POST['imagem_exibicao']
            );
        }
    }
 
 
    /**
     * Display the meta box HTML to the user.
     *
     * @param \WP_Post $post   Post object.
     */
    public static function html( $post ) {
        $value_duracao = get_post_meta( $post->ID, 'duracao', true );
        $value_embed = get_post_meta( $post->ID, 'embed', true );
        $value_descricao = get_post_meta( $post->ID, 'descricao', true );
        $value_imagem_exibicao = get_post_meta( $post->ID, 'imagem_exibicao', true );
        ?>
        <label for="imagem_exibicao"><?php _e( 'Imagem_exibicao', 'desafio' )?></label><br>

        <input type="url" class="imagem_exibicao" name="imagem_exibicao" id="imagem_exibicao" value="<?php echo esc_attr( $value_imagem_exibicao ); ?>">
        
        <button type="button" class="button" id="events_video_upload_btn" data-media-uploader-target="#imagem_exibicao"><?php _e( 'Escolher imagem', 'desafio' )?></button>
        <br>
        <hr>
        <br>
        <label for="duracao"><?php _e('Tempo de duração do vídeo em minutos: ','desafio') ?></label>
        <br>
        <input type="number" name="duracao" id="duracao" value="<?php echo $value_duracao ?>">
        <br>
        <hr>
        <br>
        <label for="embed"><?php _e('Link do vídeo embed: ','desafio') ?></label>
        <br>
        <input type="url" name="embed" id="embed" value="<?php echo $value_embed ?>">
        
        <br>
        <hr>
        <br>
        <label  for="descricao"><?php _e('Descrição do vídeo: ','desafio') ?></label>
        <br>
        <textarea name="descricao" id="descricao" cols="50" rows="10">
        <?php echo $value_descricao ?>
        </textarea>
        <?php
        wp_nonce_field( 'desafio_form_metabox_nonce', 'desafio_form_metabox_process' );
        
    }
}
 
add_action( 'add_meta_boxes', [ 'DesafioVideos_Meta_Box', 'add' ] );
add_action( 'save_post', [ 'DesafioVideos_Meta_Box', 'save' ] );