            <footer>
                <div class="half_separator_bar">&nbsp;</div>
                
                <p id="my_text_footer">Diseño de Christian García Herreras<br />2014 - <?php echo date("Y"); ?></p>
                
                <?php wp_nav_menu( array('theme_location' => 'MenuSocial', 'container' => 'ul') ); ?>
            </footer>
        </div>
        </div>
        <!-- END WRAPPER -->
        
        <!-- JS -->
        <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery-1.11.1.min.js"></script>
        <!-- END JS -->
        
        <!-- WP FOOTER -->
        <?php wp_footer(); ?>
        <!-- WP FOOTER -->
    </body>
</html>