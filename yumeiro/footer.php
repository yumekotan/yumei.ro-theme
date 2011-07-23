            <div id="footer">
                <p>&copy;Copyright <?php echo date('Y'); ?> Amy Marshall</p>
                <? wp_nav_menu(array(
                        "menu" => "footer",
                        "menu_class" => "footer-links"
                )); ?>
            </div> <!-- END FOOTER -->
        </div> <!-- END CONTAINER -->
        <?php wp_footer(); ?>
    </body>
</html>
