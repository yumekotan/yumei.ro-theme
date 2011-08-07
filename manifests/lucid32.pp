group {
    "puppet":
        ensure => present;
}

include wordpress

file {
    "/source/wordpress/wp-content/themes/yumeiro":
        ensure => link,
        target => "/vagrant/yumeiro",
        require => Exec["untar_wordpress"];
}
