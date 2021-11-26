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
        $PRODUCT_model = Model('PRODUCT_model');
        $CATEGORY_model = Model('CATEGORY_model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $keyword = $_GET['q'] ?? '';
        $end_page = ceil($PRODUCT_model->count() / LIMIT);
        $product_list = $PRODUCT_model->get_list_active($keyword, $start, LIMIT);
        $category_list = $CATEGORY_model->get_list();
        $count_product_list_active = $PRODUCT_model->count_active($keyword);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['product_list'] = $product_list;
        $this->data['data']['category_list'] = $category_list;
        $this->data['data']['count_active'] = $count_product_list_active;
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
