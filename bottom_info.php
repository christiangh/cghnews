<div id="bottom_info">
<?php

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
    
    echo '<li class="archive secondary_box odd_bottom_info">';
    echo '<h4 class="sidebar_title">Archivo</h4>';
    echo "<ul>";
    wp_get_archives( $args );
    echo "</ul>";
    echo '</li>';
    /** ARCHIVE **/
    
    /** AUTOR BIO **/
    get_template_part('author_bio');
    /** AUTOR BIO **/

?>
</div>