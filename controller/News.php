<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class News extends \Controller\Controller
{
    public function index()
    {
        $this->data["subview"] = "client/news/list";
        View("client/main", $this->data);
    }

    public function detail()
    {
        echo $this->param[0];
        $this->data["subview"] = "client/news/detail";
        $this->data["data"] = "product";
        View("client/main", $this->data);
    }
}
