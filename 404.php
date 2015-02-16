
<?php get_header(); ?>

<?php
/*
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $search_query = array('posts_per_page' => '3',
                          'paged' => $paged,
                         );
    $wp_query = new WP_Query($search_query);
*/
    
?>

<main>

<div id="main_box">
    <div id="main_error" class="crumpled_foil">
        <p class="title_error">ERROR 404, página desconocida o no disponible.</p>
        <p>Mis disculpas, pero la página que buscaba no está disponible en estos momentos, por favor haga click en la siguiente imagen para volver a la página inicial.</p>
        <div id="link_container_404">
            <a href="<?php echo home_url(); ?>"><img id="logo_to_home" src="<?php bloginfo('template_url');?>/images/blog_logo.png" /></a>
        </div>
    </div>
</div>

<?php get_sidebar( '' ); ?>

</main>

<?php get_footer(); ?>