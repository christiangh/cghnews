
<?php if( is_home() ){ ?>
    <div id="bottom_info">
<?php }else{ ?>
    <aside id="sidebar" role="complementary">
<?php } ?>

<?php

if( !is_home() ){
    /** CATEGORY TREE **/
    $args = array(
	'show_option_all'    => '',
	'orderby'            => 'name',
	'order'              => 'ASC',
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'use_desc_for_title' => 1,
	'child_of'           => 0,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => 1,
	'title_li'           => '<h4 class="sidebar_title">Secciones</h4>',
	'show_option_none'   => __( 'No categories' ),
	'number'             => null,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'category',
	'walker'             => null
    );
    
    wp_list_categories( $args );
    /** CATEGORY TREE **/
}
    
    /** ARCHIVE **/
    $args = array(
	'type'            => 'monthly',
	'limit'           => '',
	'format'          => 'html', 
	'before'          => '',
	'after'           => '',
	'show_post_count' => true,
	'echo'            => 1,
	'order'           => 'DESC'
    );
    
    echo '<li class="archive secondary_box">';
    echo '<h4 class="sidebar_title">Archivo</h4>';
    echo "<ul>";
    wp_get_archives( $args );
    echo "</ul>";
    echo '</li>';
    /** ARCHIVE **/
    
    /** AUTOR BIO **/
    get_template_part('author_bio');
    /** AUTOR BIO **/
    
    /** CONTACT **/
    //if ( is_active_sidebar( 'my-contact-form' ) ) : 
        echo '<li class="social_sharing secondary_box">';
   		dynamic_sidebar( 'my-contact-form' );
        echo '</li>';
    //endif;
    /** CONTACT **/

?>

<?php if( is_home() ){ ?>
    </div>
<?php }else{ ?>
    </aside>
<?php } ?>