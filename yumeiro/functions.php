<?php

register_nav_menus(array(
    "main-navigation" => "Main Navigation",
    "footer" => "Footer Menu"
));

register_sidebar(array(
    "name" => "Navigation Sidebar",
    "id" => "navigation-sidebar"
));

register_sidebar(array(
    "name" => "Content Sidebar",
    "id" => "content-sidebar"
));

?>
