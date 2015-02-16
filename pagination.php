<?php
    if($wp_query->found_posts > 8){
        $previous_pag = "";
        $next_pag = "";
?>
    <div id="pagination">
<?php
        ob_start();
        echo get_previous_posts_link('&laquo; Ver artículos más recientes');
        $previous_pag = ob_get_contents();
        ob_end_clean();
        
        if(!empty($previous_pag)){
?>
        <div class="pag-previous"><?php echo $previous_pag; ?></div>
<?php
        }
        
        ob_start();
        echo get_next_posts_link('Ver artículos más antiguos &raquo;');
        $next_pag = ob_get_contents();
        ob_end_clean();
        
        if(!empty($next_pag)){
?>
        <div class="pag-next"><?php echo $next_pag; ?></div>
<?php
        }
?>
    </div>
<?php } ?>