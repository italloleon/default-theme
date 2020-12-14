<?php  get_header()?>

<?php get_template_part( '/templates/banner-home' ) ?>
<?php get_template_part( '/templates/lista-videos-home', null,[ 'filmes'] ) ?>
<?php get_template_part( '/templates/lista-videos-home', null,[ 'documentarios'] ) ?>
<?php get_template_part( '/templates/lista-videos-home', null,[ 'series'] ) ?>


<?php  get_footer()?>