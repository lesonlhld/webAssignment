<?php

/**
 * Constant
 * Define global function
 * Call by function_name
 * @author    Le Trung Son    lesonlhld@gmail.com
 */

// Call Model
function Model($model_path_name)
{
    $model_file = "model/" . $model_path_name . ".php";
    if (!file_exists($model_file)) return exit('Invalid Model!');

    $model_name = end(explode('/', $model_path_name));
    // Call model
    $model = '\\Model\\' . $model_name;

    // Initialize Model
    return new $model;
}

// Call View
function View($view_path, $param = array(), $statusCode = 200, $typeExt = 'php')
{
    http_response_code($statusCode);
    if (empty($view_path) || $typeExt == 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($param, JSON_PRETTY_PRINT);
    } else {
        $view_file = "view/" . $view_path . '.' . $typeExt;
        includeWithVariables($view_file, $param);
    }
}

function includeWithVariables($filePath, $variables = array(), $print = true)
{
    $output = null;
    if (file_exists($filePath)) {
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        header('Cache-Control: max-age=86400');
        include $filePath;
        // include BASE_PATH . "/" . $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;
}

// Get base URL with subpath
function site_url($url = "")
{
    return BASE_URL . $url;
}

// Get base URL with subpath
function base_url($url = "")
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
