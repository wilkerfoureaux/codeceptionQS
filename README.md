# codeception on linux

> using ubuntu 19.04, php CLI new installation

install composer
https://getcomposer.org/download

enable php extensions, if aren't
    
    $ sudo phpenmod opcache pdo calendar ctype curl exif fileinfo ftp gettext iconv json phar posix readline shmop sockets sysvmsg sysvsem sysvshm tokenizer

install php extensions if aren't

    $ sudo apt-get install php-curl php-mbstring php-xml

install codeception
https://codeception.com/quickstart

## troubleshot

maybe you want to put composer to run in your entire system | bash
https://stackoverflow.com/a/57528762/6335839