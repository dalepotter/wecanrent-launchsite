# Wecanrent Launch Site - Installation

The following steps will get the site up and running. 

## Prerequistes

- Apache server
- PHP v5
- Composer
- Access to Dale's email sending script (this is not currently under git)


## Technology set-up

The repository is mainly static HTML and CSS. However `.htaccess` routes all requests to `index.php`, which acts as a controller.

Templating is done using [Twig](http://twig.sensiolabs.org/) and signups are sent by SMTP email using [phpmailer](https://github.com/PHPMailer/PHPMailer).

Dependencies are handled using [composer](http://culttt.com/2013/01/07/what-is-php-composer/).

## Running a local version

    # Clone the repository and navigate into the directory
    git clone https://github.com/dalepotter/wecanrent-launchsite.git
    cd wecanrent-launchsite

    # Install dependencies using composer
    composer install

    # Copy and edit the config file
    cp config.php.example config.php
    nano config.php
    
    # Copy and edit the email sending file to mail/emailfromgmail.php
    # Note this is not in git as it contains passwords

    # Test using MAMP - Note the PHP built-in webserver doesn't support .htaccess
