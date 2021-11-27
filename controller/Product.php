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
        $PRODUCT_Model = Model('PRODUCT_Model');
        $product = $PRODUCT_Model->get($id);
        $CATEGORY_Model = Model('CATEGORY_Model');
        $category_list = $CATEGORY_Model->get_list();
        $COMMENT_Model = Model('COMMENT_Model');
        $comment_list = $COMMENT_Model->get_list_by_product($id);
        $count_comment = $COMMENT_Model->count_by_product($id);
        $this->data["subview"] = "client/product/detail";
        $this->data['data']['category_list'] = $category_list;
        $this->data["data"]['product'] =  $product;
        $this->data['data']['comment_list'] = $comment_list;
        $this->data['data']['count_comment'] = $count_comment;
        View("client/main", $this->data);
    }

    public function add_comment(){
        is_login();
        $data = $_POST;
        $product_id = $_GET['id'];
        if ($data["comment"] == ""){
            View("", ['msg' => 'Text không được để trống'], 401);
        }
        else if(isset($data["stars-rating"])){
            View("", ['msg' => 'Bạn chưa rate sao'], 401);
        }
        else{
            $COMMENT_Model = Model('COMMENT_Model');
            $COMMENT_Model->create($_SESSION['id'], $product_id, $data);  
            View("", ['msg' => 'Cập nhật thành công']);
        }
    }
}
