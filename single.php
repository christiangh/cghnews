
<?php get_header( ); ?>

<main>

<div id="main_box">
<?php while ( have_posts() ) : the_post(); ?>
    
    <?php get_template_part( 'content', get_post_format() ); ?>
    
<?php endwhile; ?>

<?php
    /** SHARE **/
    if ( function_exists( 'sharing_display' ) ) {
        sharing_display( '', true );
    }
    /** SHARE **/
    
    /** LIKES **/ 
    if ( class_exists( 'Jetpack_Likes' ) ) {
        $custom_likes = new Jetpack_Likes;
        echo $custom_likes->post_likes( '' );
    }
    /** LIKES **/
    
    /** RELATED POSTS **/
    related_posts();
    /** RELATED POSTS **/

    /** COMMENTS **/
    if ( comments_open() || get_comments_number() ) :
        comments_template('', true);
    endif;
    /** COMMENTS **/
?>
</div>

<?php get_sidebar( '' ); ?>

</main>

<?php get_footer(); ?>