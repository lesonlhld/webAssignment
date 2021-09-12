<?php

/**
 * Constant
 * Define global constant, function
 * Get constant by VARIABLE_name or function_name
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

// Get base URL with subpath
function site_url($url = "")
{
    return BASE_URL . $url;
}

// Show 404 page or response 404 code
function notFound($enable404 = false)
{
    if (!$enable404) exit('Page not found...');
    $statusCode = 404;
    http_response_code($statusCode);
}

// Redirect to absolute URL
function redirect($url, $code = 302)
{
    // header("Refresh:0; url=" . $url;
    header("Location: " . $url, true, $code);
    exit;
}

function throwError($message = null)
{
    if (is_string($message)) {
        throw new Exception($message);
    } else {
        throw new Exception("An unknown error!");
    }
}
