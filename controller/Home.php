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
}
