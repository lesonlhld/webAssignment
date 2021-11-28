<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Cart extends \Controller\Controller
{
    public function index()
    {
        is_login();
        $this->data["subview"] = "client/member/cart";
        View("client/main", $this->data);
    }

    public function add()
    {
        is_login();
        $data = $_POST;
        $product_id = $data["product_id"];
        if ($product_id == "") {
            return;
        }
        $PRODUCT_Model = Model('PRODUCT_Model');
        $product = $PRODUCT_Model->get($product_id);
        $quantity = (int)$data["quantity"];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['cart_total'] = 0;
        }
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$product_id]["quantity"] += $quantity;
        } else {
            $unit_price = $product->price * (100 - $product->discount) / 100;
            $_SESSION['cart'][$product_id] = array("name" => $product->product_name, "description" => $product->description, "quantity" => $quantity, "unit_price" => $unit_price, "image" => $product->image);
        }
        $_SESSION['cart_total'] += $quantity * $_SESSION['cart'][$product_id]["unit_price"];
        return;
    }

    public function remove()
    {
        is_login();
        if (!isset($_GET['id'])) {
            notFound();
        } else {
            $this->data["subview"] = "client/member/cart";
            View("client/main", $this->data);
        }
    }

    public function delete_item(){
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $_SESSION['cart_total'] -= $_SESSION['cart'][$product_id]["unit_price"] * $_SESSION['cart'][$product_id]["quantity"];
            unset($_SESSION['cart'][$product_id]);
            View("", ['total' => number_format($_SESSION['cart_total']) . " VND", 'num_product' => count($_SESSION['cart'])]);
        }
        return;
    }
}
