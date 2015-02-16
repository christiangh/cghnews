<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area secondary_box">

	<?php if ( have_comments() ) : ?>
        <h4 class="comments-title sidebar_title">Comentarios</h4>
        
        <h4 class="info_comments">
        <?php
			printf( _nx( 'Un comentario en &ldquo;%2$s&rdquo;', '%1$s comentarios en &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
        ?>
        </h4>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol>


	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments">Comentarios cerrados</p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>
