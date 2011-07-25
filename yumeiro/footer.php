            <div id="footer">
                <p>yumei.ro &copy; <?php echo date('Y'); ?> Yumeko</p>
                <? wp_nav_menu(array(
                        "menu" => "footer",
                        "menu_class" => "footer-links"
                )); ?>
            </div> <!-- END FOOTER -->
        </div> <!-- END CONTAINER -->
        <?php wp_footer(); ?>
    </body>
</html>
