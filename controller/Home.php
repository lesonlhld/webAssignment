<?php

namespace Controller;

use Constant;

/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Home extends Controller
{
    public function index()
    {
        $this->View("Index");
        // echo Constant::BASE_URL;
    }

    public function get_city()
    {
        $USER_Model = $this->Model('CITY_Model');
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($USER_Model->get_city(), JSON_PRETTY_PRINT);
    }
}
