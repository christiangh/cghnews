
<?php get_header(); ?>

<?php wp_nav_menu( array('theme_location' => 'MenuPrincipal', 'container' => 'nav') ); ?>

<main>
    <div id="main_column_front">
<?php
    if (have_posts()) :
        query_posts(array('showposts' => '8'));
        $opened_other_post = 0;
        $post_count = 1;
        while (have_posts()) :
            the_post();
            
            $category_name = array();
            foreach((get_the_category()) as $category) {
                $category_name[] = $category->cat_name;
            }
            $category_name = implode($category_name, ", ");
            
            if($post_count == 1){
                /** MAIN POST **/
?>
        <article id="main_post_front">
            <h2 class="title_post main_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('index-thumbnail');?></a>
            <div class="three_cols text_excerpt"><?php the_excerpt(); ?></div>
            <div class="foot_post">
                <p class="category_post"><?php the_category( ', ' ); ?></p>
                <p class="date_post"><?php the_time("d F, Y"); ?></p>
            </div>
        </article>            
<?php   
                /** MAIN POST **/
            }elseif($post_count == 2){
?>
        <article id="secondary_post_front">
            <h2 class="title_post"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('index-thumbnail');?></a>
            <div class="text_excerpt"><?php the_excerpt(); ?></div>
            <div class="foot_post">
                <p class="category_post"><?php the_category( ', ' ); ?></p>
                <p class="date_post"><?php the_time("d F, Y"); ?></p>
            </div>
        </article>
<?php
            }elseif($post_count <= 8){
                if($opened_other_post == 0){
                /** CERRAMOS main_column_front Y ABRIMOS other_column_front **/
?>
    </div>
    <div id="other_column_front_1">
<?php
                    $opened_other_post = 1;
                }
                if($post_count == 3 || $post_count == 4){
?>
        <article class="tertiary_post_front<?php if ($post_count%2 != 0){echo " odd";} ?>">
            <h2 class="title_post"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <div class="text_excerpt"><?php the_excerpt(); ?></div>
            <div class="foot_post">
                <p class="category_post"><?php the_category( ', ' ); ?></p>
                <p class="date_post"><?php the_time("d F, Y"); ?></p>
            </div>
        </article>
<?php
                }else{
                    if($post_count == 5){
?>
    </div>
    <div id="other_column_front_2">
<?php
                    }
?>
        <article class="headline_post_front<?php if ($post_count%2 != 0){echo " odd";} if($post_count == 8){echo " last_post_front";}?>">
            <h2 class="title_post"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">- <?php the_title(); ?></a></h2>
            <div class="foot_post">
                <p class="category_post"><?php the_category( ', ' ); ?></p>
                <p class="date_post"><?php the_time("d F, Y"); ?></p>
            </div>
        </article>
<?php
                }
?>
    
<?php  
            }
?>
        
<?php
            $post_count++;
        endwhile;
?>
    </div>
<?php else :?>
    </div>
<?php endif; ?>

<!-- BOTTOM INFO -->
<?php get_sidebar( '' ); ?>
<!-- BOTTOM INFO -->

</main>

<?php get_footer(); ?>
