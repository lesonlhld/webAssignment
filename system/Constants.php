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
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $protocol = "https://" . $_SERVER['HTTP_HOST'];
        } else {
            $protocol = 'http://' . $_SERVER['HTTP_HOST'];
        }

        define("BASE_URL", $protocol . '/');
        break;

    default:
        exit('The application environment is not set correctly.');
}

// Other constants here
// ...
