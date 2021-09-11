<?php

namespace System;


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
        $uri = $_SERVER['REQUEST_URI'];

        // Remove webAssignment path if existing in uri (http://localhost/webAssignment/)
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
        $path = "";
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
                $path = $path . $this->uri[$i] . '\\';
                // Get controller
                $controller = $this->uri[$i];
            }
        }

        // If no function, set default index
        if (empty($function)) $function = "index";

        $path = str_replace($controller . '\\', '', $path);

        $controller = $this->parseCtrl($controller);

        // Initialize controller
        $class = '\\Controller\\' . $path . $controller;
        if (class_exists($class)) {
            return new $class($function, $param);
        } else {
            return new \Controller\Error($function, $param);
        }
    }

    private function parseCtrl($str)
    {
        if (!$str) return 'Home';

        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
    }
}
