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
        $PRODUCT_Model = Model('PRODUCT_Model');

        $product_list = $PRODUCT_Model->get_list_active();

        $this->data['data']['product_list'] = $product_list;
        $this->data["subview"] = "client/product/list";
        View("client/main", $this->data);
    }

    public function detail()
    {
        $id = $_GET['id'];
        $this->data["subview"] = "client/product/detail";
        $this->data["data"] = "product";
        View("client/main", $this->data);
    }
}
