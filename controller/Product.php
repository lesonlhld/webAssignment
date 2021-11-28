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
        $CATEGORY_Model = Model('CATEGORY_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $keyword = $_GET['q'] ?? '';
        $end_page = ceil($PRODUCT_Model->count() / LIMIT);
        $product_list = $PRODUCT_Model->get_list_active($keyword, $start, LIMIT);
        $category_list = $CATEGORY_Model->get_list();
        $count_product_list_active = $PRODUCT_Model->count_active($keyword);

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
        $product_id = $data["product_id"];
        if ($data["comment"] == ""){
            View("", ['msg' => 'Vui lòng nhập nhận xét!'], 400);
        }
        else{
            $COMMENT_Model = Model('COMMENT_Model');
            if ($COMMENT_Model->create($_SESSION['id'], $product_id, $data)){
                $PRODUCT_Model = Model('PRODUCT_Model');
                $PRODUCT_Model->update_rate($product_id);
            }  
            View("", ['msg' => 'Nhận xét sản phẩm thành công']);
        }
    }

    public function add_to_cart(){
        is_login();
        $data = $_POST;
        $product_id = $data["product_id"];
        if ($product_id == ""){
            return;
        }
        $PRODUCT_Model = Model('PRODUCT_Model');
        $product = $PRODUCT_Model->get($product_id);
        $quantity = (int)$data["quantity"];
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            $_SESSION['cart_total'] = 0;
        }
        if (array_key_exists($product_id, $_SESSION['cart'])){
            $_SESSION['cart'][$product_id]["quantity"] += $quantity;
            
        }
        else{
            $unit_price = $product->price * (100 - $product->discount) / 100;
            $_SESSION['cart'][$product_id] = array("name" => $product->product_name, "description" => $product->description, "quantity" => $quantity, "unit_price" => $unit_price, "image" => $product->image);
        }
        $_SESSION['cart_total'] += $quantity * $_SESSION['cart'][$product_id]["unit_price"];
        return;
        
    }
}
