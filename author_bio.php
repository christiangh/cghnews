<li class="author_bio secondary_box">
    <h4 class="sidebar_title">Sobre mí</h4>
    <div class="my_bio">
    <?php
        $user = get_the_author_meta( 'ID' );
        if(!empty($user)){
            echo get_avatar(get_the_author_meta( 'ID' ), 80);
            echo get_the_author_meta( 'description');
        }else{
            echo get_avatar(1, 80);
            echo get_the_author_meta( 'description', 1);
        }
    ?>
    </div>
</li>