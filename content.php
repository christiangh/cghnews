<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="main_title"><?php the_title(); ?></h1>
        <div class="subtitle"><span class="left"><?php the_category( ', ' ); ?></span><span class="right"><?php the_time("d F, Y"); ?></span></div>
	</header>
    
    <?php the_post_thumbnail('index-thumbnail-single');?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<footer class="entry-footer">
		<span class="left"><?php the_author(); ?></span>
        <span class="right"><?php the_time("d F, Y"); ?></span>
	</footer>

</article>