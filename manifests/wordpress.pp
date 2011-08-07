class wordpress {
    package {
        "apache2":
            ensure => latest;
        "php5":
            ensure => latest;
        "libapache2-mod-php5":
            ensure => latest;
        "mysql-server":
            ensure => latest;
        "php5-mysql":
            ensure => latest;
        "php5-gd":
            ensure => latest;
    }

    file {
        "/source":
            ensure => directory;
        "/var/www/wordpress":
            ensure => link,
            require => Exec["untar_wordpress"],
            target => "/source/wordpress";
        "/source/wordpress":
            recurse => true,
            require => Package["apache2"],
            owner => "www-data",
            group => "www-data";
        "/etc/apache2/sites-available/default":
            content => "<VirtualHost *:80>
            ServerAdmin webmaster@localhost
            DocumentRoot /var/www/wordpress
            <Directory />
                Options FollowSymLinks
                AllowOverride None
            </Directory>
            <Directory /var/www/wordpress>
                AllowOverride All
            </Directory>
        </VirtualHost>";
    }

    service {
        "apache2":
            ensure => running,
            subscribe => File["/etc/apache2/sites-available/default"],
            require => Package["apache2"];
        "mysql":
            ensure => running,
            require => Package["mysql-server"];
    }

    exec {
        "enable_rewrite":
            command => "a2enmod rewrite",
            path => ["/usr/bin", "/usr/local/bin", "/usr/sbin"],
            require => Package["apache2"],
            before => Service["apache2"];
        "download_wordpress":
            command => "wget http://wordpress.org/latest.tar.gz",
            path => ["/usr/bin", "/usr/local/bin", "/bin"],
            creates => "/source/latest.tar.gz",
            cwd => "/source",
            require => File["/source"];
        "untar_wordpress":
            command => "tar xvzf latest.tar.gz",
            path => ["/usr/bin", "/usr/local/bin", "/bin"],
            creates => "/source/wordpress",
            cwd => "/source",
            require => Exec["download_wordpress"];
        "create_fake_mysql":
            unless => "mysql -u wordpress -p wordpress wordpress",
            command => "mysql -u root -e \"create database wordpress; grant all privileges on wordpress.* to wordpress@localhost identified by 'wordpress';\"",
            path => ["/usr/bin", "/usr/local/bin", "/bin"],
            require => Service["mysql"];
    }
}
