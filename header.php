<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
       <!-- METAS -->
       <meta charset="<?php bloginfo( 'charset' );?>" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <?php if( is_search() || is_404() ){ echo '<meta name="robots" content="noindex, follow">'; } ?>
       <!-- /METAS -->
       <title>
       <?php
            global $page, $paged;
            wp_title( '|', true, 'right' );
            // Agrega el nombre del blog.
            bloginfo( 'name' );
            // Agrega la descripción del blog, en la página principal.
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
       ?>
       </title>
       <!-- CSS -->
       <link href='<?php bloginfo( 'stylesheet_url' ); ?>' rel="stylesheet" />
       <!-- /CSS -->
       <!-- RSS & PINGBACKS -->
       <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
       <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
       <!-- /RSS & PINGBACKS -->
       <!--[if IE]>
       <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
       <![endif]-->
       <?php
            wp_head();
       ?>
    </head>

    <body <?php body_class(); ?>>
    <!-- START WRAPPER -->
        <div id="wrapper">
        <div id="page">
            <header id="<?php if( is_home() ){echo "header_home";}else{echo "header_rest";} ?>">
                <div class="header_box center">
                <?php
                    if(is_home()){
                ?>
                        <a href="<?php echo home_url(); ?>"><img id="blog_logo" src="<?php bloginfo('template_url');?>/images/blog_logo.png" /></a>
                <?php
                    }else{
                ?>
                        <a href="<?php echo home_url(); ?>"><img id="blog_logo_rest" src="<?php bloginfo('template_url');?>/images/blog_logo_rest.png" /></a>
                <?php
                    }
                ?>
                </div>
                <div class="header_box left">
                <?php get_template_part('main_web_nav'); ?>
                </div>
                <div class="header_box right">
                <?php
                    /** SEARCHER **/
                    get_search_form();
                    /** SEARCHER **/
                ?>
                </div>
                <div class="<?php if( is_home() ){echo "separator_bar";}else{echo "half_separator_bar";} ?>">&nbsp;</div>
            </header>