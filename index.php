<?php

/**
 * index.php
 *
 * @author    Le Trung Son    lesonlhld@gmail.com
 */

// Show error to debug, set environment to hide error
define('ENVIRONMENT', 'development');

switch (ENVIRONMENT) {
    case 'development':
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL | E_STRICT);
        break;

    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>=')) {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;

    default:
        exit('The application environment is not set correctly.');
}


// All requests will run into index.php file
// First, run command "composer install" && "composer dump-autoload to load library and PSR-4 autoload
require_once __DIR__. '/vendor/autoload.php';
require_once __DIR__. '/system/Constants.php';

use System\App;
new App;
