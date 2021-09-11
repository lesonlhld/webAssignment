<?php

namespace Controller;

/**
 * Controller
 * Root Controller (Base Controller)
 * All reused function will be coded in here
 * To using this function, call $this->function_name()
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Controller
{
    public $function;
    public $param;
    public $method;
    public $data;

    public function __construct($function, $param)
    {
        $this->function = $function;
        $this->param = $param;
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->data = (object) ['success' => false, 'data' => null];
        $this->init();
    }

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

        // Call base model
        require_once "model/Model.php";

        $model_name = end(explode('/', $model_path_name));
        // Call model
        require_once $model_file;
        $model = '\\Model\\' . $model_name;

        // Initialize Model
        return new $model;
    }

    // Call View
    protected function View($view_path, $param = null, $ext = 'html')
    {
        http_response_code(200);
        include "view/" . ucwords($view_path) . '.' . $ext;
        exit;
    }

    protected function notFound()
    {
        exit('Page not found...');
    }
}
