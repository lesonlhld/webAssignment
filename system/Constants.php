<?php

/**
 * Constant
 * Define global constant
 * Get constant by VARIABLE_name
 * @author    Le Trung Son    lesonlhld@gmail.com
 */

switch (ENVIRONMENT) {
    case 'development':
        // For localhost
        define("BASE_PATH", $_SERVER["DOCUMENT_ROOT"] . '/webAssignment');
        define("BASE_URL", "http://localhost/webAssignment/");
        break;

    case 'production':
        // For domain
        define("BASE_PATH", $_SERVER["DOCUMENT_ROOT"]);
        define("BASE_URL", $_SERVER['SERVER_NAME']);
        break;

    default:
        exit('The application environment is not set correctly.');
}

// Other constants here
// ...
