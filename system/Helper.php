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

function linkseo($str)
{
    $str = stripUnicode($str);
    $str = str_replace("?", "", $str);
    $str = str_replace("&", "", $str);
    $str = str_replace(",", "", $str);
    $str = str_replace(".", "", $str);
    $str = str_replace("+", "", $str);
    $str = str_replace(":", "", $str);
    $str = str_replace("'", "", $str);
    $str = str_replace("  ", " ", $str);
    $str = str_replace("'", "", $str);
    $str = trim($str);
    $str = mb_convert_case($str, MB_CASE_TITLE, 'utf-8');
    $str = str_replace(" ", "-", $str);
    $str = strtolower($str);
    $str = str_replace("ß", "ss", $str);
    $str = str_replace("%", "", $str);
    $str = preg_replace("/[^_a-zA-Z0-9 -]/", "", $str);
    $str = str_replace(array('%20', ' '), '-', $str);
    $str = str_replace("----", "-", $str);
    $str = str_replace("---", "-", $str);
    $str = str_replace("--", "-", $str);
    return strtolower($str);
}

function stripUnicode($str)
{
    if (!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach ($unicode as $khongdau => $codau) {
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }
    return strtolower($str);
}

function upload_file($folder, $type, $field_name)
{
    if (!file_exists('source/')) {
        mkdir('source/', 0777);
    }
    $success = true;
    $config['upload_path'] = 'source' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR;
    if (!file_exists($config['upload_path'])) {
        mkdir($config['upload_path'], 0777);
    } else {
        chmod($config['upload_path'], 0777);
    }
    $config['max_size'] = 5000000;
    if ($type == "image") {
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        $config['allowed_types'] = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
        $config['allowed_exts'] = array('gif', 'jpeg', 'jpg', 'png');
        $config['msg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    } else if ($type == "excel") {
        $config['allowed_types'] = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $config['allowed_exts'] = array('xls', 'xlsx', 'csv');
        $config['msg'] = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    } else {
    }

    if (isset($_FILES[$field_name]['name']) && $_FILES[$field_name]['name'] != "") {
        $file_extension = strtolower(pathinfo($_FILES[$field_name]["name"], PATHINFO_EXTENSION));
        if (in_array($_FILES[$field_name]['type'], $config['allowed_types']) && in_array($file_extension, $config['allowed_exts'])) {

            // We want to save the image with timestamp and randomnumber in prefix
            $prefix = time() . rand() . '_';
            $target_file = $config['upload_path'] . $prefix . basename($_FILES[$field_name]["name"]);

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES[$field_name]["tmp_name"]);
            if ($check == false) {
                echo "File is not an image.";
                $success = false;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $success = false;
            }

            // Check file size
            if ($_FILES[$field_name]["size"] > $config['max_size']) {
                echo "Sorry, your file is too large.";
                $success = false;
            }

            // Check if $success is set to false by an error
            if ($success == true) {
                if (!move_uploaded_file($_FILES[$field_name]["tmp_name"], $target_file)) {
                    echo "Sorry, there was an error uploading your file.";
                }
                return $prefix . $_FILES[$field_name]["name"];
            }
        } else {
            echo $config['msg'];
        }
    }
    return "";
}
