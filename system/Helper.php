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

    $tmp = explode('/', $model_path_name);
    $model_name = end($tmp);
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
    if (!$enable404) {
        $data["subview"] = "client/not_found";
        View("client/main", $data);
        exit();
    } else {
        $statusCode = 404;
        http_response_code($statusCode);
    }
}

// Show 404 page or response 404 code
function adminNotFound($enable404 = false)
{
    if (!$enable404) {
        $data["subview"] = "admin/not_found";
        View("admin/main", $data);
        exit();
    } else {
        $statusCode = 404;
        http_response_code($statusCode);
    }
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


function hashpass($str)
{
    return hash('sha1', $str);
}

function is_login()
{
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] == false) {
        redirect(site_url("auth/login"));
    }
}

function is_admin_login()
{
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] == false || !isset($_SESSION['role']) || $_SESSION['role'] != 2) {
        redirect(site_url("admin/auth"));
    }
}
