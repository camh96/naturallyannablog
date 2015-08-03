<?php

date_default_timezone_set("Pacific/Auckland");

error_reporting(E_ALL);

if (stristr($_SERVER['HTTP_HOST'], ".yoobee.net.nz")) {
    define("DEV_ENVIRONMENT", false);
    // production environment
    ini_set('display_errors', true);
    ini_set("log_errors", 1);
    ini_set("error_log", getcwd() . "/php-error.log");

    define('MAILGUN_KEY', 'key-67143118b148b5e88fa6fea571b390b4');
    define('MAILGUN_DOMAIN', 'sandbox1fe06f5955724020bddd7c7be8ca645c.mailgun.org');

    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'schlocktoberfest');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    
    
} else {
    define("DEV_ENVIRONMENT", true);
    // local developer environment
    ini_set('display_errors', true);
    ini_set("log_errors", 1);
    ini_set("error_log", getcwd() . "/php-error.log");


    define('MAILGUN_KEY', 'key-67143118b148b5e88fa6fea571b390b4');
    define('MAILGUN_DOMAIN', 'sandbox1fe06f5955724020bddd7c7be8ca645c.mailgun.org');
    
        define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'schlocktoberfest');
    define('DB_USER', 'root');
    define('DB_PASS', '');

}