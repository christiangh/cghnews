<?php

/*------------------------------------------------------------*/
/*   Registrar Menus WP3.0+
/*------------------------------------------------------------*/
   if ( function_exists( 'register_nav_menus' ) )
   {
      register_nav_menus(
        array(
              'MenuPrincipal' => __( 'Menu Principal' ),
              'MenuSocial' => __( 'Menu Redes Sociales' ),
             )
      );
   }

/*------------------------------------------------------------*/
/*  Activar thumbnails
/*------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*------------------------------------------------------------*/
/*  Leer más
/*------------------------------------------------------------*/
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '" title="Leer artículo completo">[+]</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/*------------------------------------------------------------*/
/*   Contador de posts de la categoría e hijos
/*------------------------------------------------------------*/
function wp_get_cat_postcount($id) {
    $cat = get_category($id);
    $count = (int) $cat->count;
    $taxonomy = 'category';
    $args = array(
      'child_of' => $id,
    );
    $tax_terms = get_terms($taxonomy,$args);
    var_dump($tax_terms);
    exit();
    foreach ($tax_terms as $tax_term) {
        $count +=$tax_term->count;
    }
    return $count;
}

/*------------------------------------------------------------*/
/*   Compartiendo con Jetpack
/*------------------------------------------------------------*/
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
 
add_action( 'loop_start', 'jptweak_remove_share' );


/*------------------------------------------------------------*/
/*   Register our sidebars and widgetized areas.
/*------------------------------------------------------------*/
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'My contact form',
		'id'            => 'my_contact_form',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="sidebar_title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

?>