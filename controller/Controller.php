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

    public function __construct($function, $param)
    {
        $this->function = $function;
        $this->param = $param;
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->data = array();
        $this->init();
    }

    // Initialize to parse function, if not found, redirect to 404 page 
    protected function init()
    {
        session_start();

        if (empty($this->function)) return notFound();

        $f = lcfirst($this->function);
        $mf = '__' . $this->method . $this->function;

        if (is_callable([$this, $mf])) return $this->$mf(); // call POST method
        if (is_callable([$this, $f])) return $this->$f(); // call GET method

        return notFound();
    }
}
