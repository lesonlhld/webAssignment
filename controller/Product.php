<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Product extends \Controller\Controller
{
    public function list()
    {
        $this->data["subview"] = "client/product/list";
        View("client/main", $this->data);
    }

    public function detail()
    {
        $this->data["subview"] = "client/product/detail";
        $this->data["data"] = "product";
        View("client/main", $this->data);
    }
}
