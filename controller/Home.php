<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Home extends \Controller\Controller
{
    public function index()
    {
        $this->data["subview"] = "client/home/home";
        View("client/main", $this->data);
    }

    public function get_city()
    {
        $USER_Model = Model('CITY_Model');
        View('', $USER_Model->get_city());
    }
}
