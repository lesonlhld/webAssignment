<?php

namespace Controller;

/**
 * Controller
 * Root Controller (Base Controller)
 * All reused function will be coded in here
 * To using this function, call $this->function_name()
 * Parse to valid Controller and Function, if not valid, redirect to 404 not found page
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Controller
{
    public $function;
    public $param;
    public $method;
    public $data;

    protected $statusCode = 200;
    protected $jsonResponse = false;
    protected $enable404 = false;

    public function __construct($function, $param)
    {
        $this->function = $function;
        $this->param = $param;
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->data = (object) ['success' => false, 'data' => null];
        $this->init();
    }

    // Initialize to parse function, if not found, redirect to 404 page 
    protected function init()
    {
        session_start();

        if (empty($this->function)) return $this->notFound();

        $f = lcfirst($this->function);
        $mf = '__' . $this->method . $this->function;

        if (is_callable([$this, $mf])) return $this->$mf(); // call POST method
        if (is_callable([$this, $f])) return $this->$f(); // call GET method

        return $this->notFound();
    }

    // Call Model
    protected function Model($model_path_name)
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
    protected function View($view_path, $param = null, $ext = 'html')
    {
        http_response_code($this->statusCode);
        if ($this->jsonResponse) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($param, JSON_PRETTY_PRINT);
        } else {
            header('Cache-Control: max-age=86400');
            include BASE_PATH . "/view/" . $view_path . '.' . $ext;
        }
        exit;
    }

    // Show 404 page or response 404 code
    protected function notFound()
    {
        if (!$this->enable404) exit('Page not found...');
        $this->statusCode = 404;
        http_response_code($this->statusCode);
    }

    // Redirect to absolute URL
    protected function redirect($url, $code = 302)
    {
        // header("Refresh:0; url=" . $url;
        header("Location: " . $url, true, $code);
        exit;
    }

    // Get base URL with subpath
    protected function site_url($url = "")
    {
        return BASE_URL . $url;
    }
}
