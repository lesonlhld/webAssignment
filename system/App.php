<?php

namespace System;

use Constant;

// Load base controller
require_once "./controller/Controller.php";

/**
 * App
 * Class App to parse URI path
 * Default domain for localhost: http://localhost/webAssignment/
 * Path after domain identify controller 
 * Parse the uri into up to 5 elements to access controller: (Folder/Subfolder/Subsubfolder/)Controller/Function(/Params)
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class App
{
    private $uri;

    public function __construct()
    {
        // Parse URI from request
        $this->uri = $this->parseUri();

        // Route to the appropriate controller
        $this->loadController();
    }

    private function parseUri()
    {
        $uri = getenv('REQUEST_URI');

        // Remove webAssignment path if existing in uri
        $uri = str_replace('/webAssignment', '', $uri);

        // ??: Null Coalescing Operator
        // Replace isset function in Ternary or Conditional operator
        // Example: $id = isset($_GET['id']) ? $_GET['id'] : '-1' = $_GET['id'] ?? '-1';

        // If REQUEST_URI is null, redirect to home page
        $uri = preg_replace('/\/+/', '/', trim(str_replace('.', '-', parse_url($uri ?? "home", PHP_URL_PATH)), '/'));

        // Parse uri to array
        $uri = $uri ? explode('/', $uri) : ['home', 'index'];

        // Check if $uri only have controller path, redirect to index page in this controller
        if (count($uri) == 1) $uri[] = 'index';

        return $uri;
    }

    private function loadController()
    {
        $function = "";
        $param = [];
        $controller_file = 'controller';
        for ($i = 0; $i < count($this->uri); $i++) {
            // Check exist Controller
            if (empty($function) && file_exists($controller_file . '.php')) {
                // Get function
                $function = $this->uri[$i];
            } else if (!empty($function) && file_exists($controller_file . '.php')) {
                // Get param
                $param[] = $this->uri[$i];
            } else {
                $controller_file = $controller_file . '/' . $this->uri[$i];
                // Get controller
                $controller = $this->uri[$i];
            }
        }

        // If no function, set default index
        if (empty($function)) $function = "index";

        // Call controller file
        $controller_file = $controller_file . '.php';
        if (file_exists($controller_file)) {
            require_once $controller_file;
        } else {
            require_once 'controller/Error.php';
        }

        // Initialize controller
        $class = '\\Controller\\' . $controller;
        if (class_exists($class)) {
            return new $class($function, $param);
        } else {
            return new \Controller\Error($function, $param);
        }
    }
}
