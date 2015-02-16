<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<h4 class="sidebar_title">Artículos relacionados</h4>
<?php if (have_posts()):?>
<ol>
	<?php
        $related_posts_count = 1;
        while (have_posts()) : the_post();
    ?>
		<?php if (has_post_thumbnail()):?>
		<li <?php if($related_posts_count == 2){echo "class='pair'";} if($related_posts_count == 4){echo "class='pair last_post_related'";}?>>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <div class="related_post_title"><?php the_title(); ?> Y más texto chalao, k lo voy a llenar de mierda esto ;)</div>
                <?php the_post_thumbnail(); ?>
                <div class="foot_post">
                    <p class="date_post"><?php the_time("d F, Y"); ?></p>
                </div>
            </a>
        </li>
		<?php endif; ?>
	<?php
            $related_posts_count++;
        endwhile;
    ?>
</ol>

<?php else: ?>

<p class="margin_top_10">No se han encontrado artículos relacionados.</p>

<?php endif; ?>
