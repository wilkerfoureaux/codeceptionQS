# codeception on linux

> using ubuntu 19.04, php CLI new installation  
> ensure that you have java SDK running, `$ java -version`

install composer
https://getcomposer.org/download

enable php extensions, if aren't

    $ sudo phpenmod opcache pdo calendar ctype curl exif fileinfo ftp gettext iconv json phar posix readline shmop sockets sysvmsg sysvsem sysvshm tokenizer

install php extensions if aren't

    $ sudo apt-get install php-curl php-mbstring php-xml

install codeception

> https://codeception.com/quickstart

run

    $ composer require codeception/module-asserts --dev

if you want to be able to debug and use `$I->pause()` method, run

    $ composer require hoa/console

if you want to run with webdriver, like chrome, follow the steps in

> https://codeception.com/docs/modules/WebDriver.html

for the chromedriver, this is the version used in tests

> https://chromedriver.storage.googleapis.com/index.html?path=80.0.3987.106/

if you want to use assertions, you can run 

    $ composer require --dev codeception/module-asserts

then re-build

    $ codecept build

## troubleshot

### run only "composer" command in shell

(1) maybe you want to put composer to run in your entire system | bash

> https://stackoverflow.com/a/57528762/6335839

### run only "codecept" command in shell

(2) if you want to run

    $ codecept [...args]

follow the same approach from case (1) adding

`alias codecept="php vendor/bin/codecept"`

in your `~/.bash_profile` file

then run `$ source ~/.bash_profile` to get it working

### codecept webdriver module requires ext-zip

(3) if you want to install webdriver, you have to be php-zip extension enabled

run

    $ sudo apt-get install php-zip -y

### Unable to create new service: ChromeDriverService

(4) if you are getting this pattern in your execution output `Unable to create new service: ChromeDriverService`

* put the chromedriver executable in the root of the project
* OR your home folder,
* OR make sure that is a absolute path