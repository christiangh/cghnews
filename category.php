
<?php get_header(); ?>

<?php
    $category_id = get_query_var('cat');
    $current_category = get_category ($category_id);
?>

<main>

<div id="main_box">

    <h1 class="main_title"><?php echo $current_category->name." (".$wp_query->found_posts.")"; ?></h1>
    <h2 class="subtitle"><?php echo $current_category->description; ?></h2>

<?php
    if (have_posts()) :
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $the_query = query_posts(array('posts_per_page' => '8','cat' => $category_id,"paged" => $paged));
        $opened_other_post = 0;
        $post_count = 1;
        while (have_posts()) :
            the_post();
            if($post_count == 1){
?>
    <article class="main_post_category text_left">
        <h2 class="title_post"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('index-thumbnail');?></a>
        <div class="text_excerpt"><?php the_excerpt(); ?></div>
        <div class="foot_post">
            <p class="category_post"><?php the_category( ', ' ); ?></p>
            <p class="date_post"><?php the_time("d F, Y"); ?></p>
        </div>
    </article>
<?php
            }elseif($post_count == 2){
?>
    <article class="main_post_category text_right">
        <h2 class="title_post"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="text_excerpt"><?php the_excerpt(); ?></div>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('index-thumbnail');?></a>
        <div class="foot_post">
            <p class="category_post"><?php the_category( ', ' ); ?></p>
            <p class="date_post"><?php the_time("d F, Y"); ?></p>
        </div>
    </article>
<?php   
            }else{
?>
    <article class="other_post_category<?php if($post_count == 5 || $post_count == 8){echo " third_on_row";} if($post_count >= 3 && $post_count <= 5){echo " first_row";}else{echo " second_row";} if ($post_count%2 != 0){echo " odd";}?>">
        <h2 class="title_post"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="text_excerpt" title="<?php the_title(); ?>"><?php the_excerpt(); ?></div>
        <div class="foot_post">
            <p class="category_post"><?php the_category( ', ' ); ?></p>
            <p class="date_post"><?php the_time("d F, Y"); ?></p>
        </div>
    </article>
<?php
            }
                $post_count++;
        endwhile;
    endif;
?>

<?php get_template_part('pagination'); ?>

</div>

<?php get_sidebar( '' ); ?>

</main>
<?php get_footer(); ?>
