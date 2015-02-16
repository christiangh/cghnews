
<?php get_header(); ?>

<main>

    <div id="main_box">
    <?php
        $archive_date = explode("*", single_month_title('*', false));
    ?>
        <h1 class="main_title">Artículos de <span class="searched_text"><?php echo ucwords($archive_date[1])." de ".$archive_date[2]; ?></span></h1>
        
		<?php if ( have_posts() ) : ?>
            <h2 class="subtitle"><?php echo $wp_query->found_posts; ?> artículos encontrados</h2>
            
            <div id="search-results">
			<?php
                $post_per_page = get_option('posts_per_page');
                $page = get_query_var('paged');
                
                if($page == 0 || empty($page)){
                    $current_page = 1;
                }else{
                    $current_page = $page;
                }
                
                if($wp_query->found_posts > ($post_per_page*$current_page)){
                    $last_post_index = $post_per_page;
                }else{
                    $tmp_count = ($post_per_page*$current_page)-$wp_query->found_posts;
                    $last_post_index = $post_per_page-$tmp_count;
                }
                
                $post_count = 1;
                while ( have_posts() ) : the_post();
                    if ($post_count%2 != 0){
            ?>
                <article class="main_post_category text_left<?php if($post_count == $last_post_index){echo " last_post_found";}?>">
                    <h2 class="title_post"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('index-thumbnail');?></a>
                    <div class="text_excerpt"><?php the_excerpt(); ?></div>
                    <div class="foot_post">
                        <p class="category_post"><?php the_category( ', ' ); ?></p>
                        <p class="date_post"><?php the_time("d F, Y"); ?></p>
                    </div>
                </article>
            <?php
                    }else{
            ?>
                <article class="main_post_category text_right<?php if($post_count == $last_post_index){echo " last_post_found";}?>">
                    <h2 class="title_post"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <div class="text_excerpt" title="<?php the_title(); ?>"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('index-thumbnail');?></a>
                    <div class="foot_post">
                        <p class="category_post"><?php the_category( ', ' ); ?></p>
                        <p class="date_post"><?php the_time("d F, Y"); ?></p>
                    </div>
                </article>
            <?php
                    }
                    
                    $post_count++;
                endwhile;
            ?>
            </div>
            
            <?php get_template_part('pagination'); ?>
            
		<?php else : ?>
            <h2 class="subtitle">No se han encontrado resultados</h2>
		<?php endif; ?>
    
    </div>

<?php get_sidebar( '' ); ?>

</main>

<?php get_footer(); ?>
