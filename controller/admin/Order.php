<?php

namespace Controller\admin;

/**
 * News
 * News for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Order extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();

        $ORDER_Model = Model('ORDER_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $end_page = ceil($ORDER_Model->count() / LIMIT);
        $order_list = $ORDER_Model->get_list(null, $start, LIMIT);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['order_list'] = $order_list;
        $this->data["subview"] = "admin/order/home";
        View("admin/main", $this->data);
    }

    public function change_status()
    {
        is_admin_login();

        $ORDER_Model = Model('ORDER_Model');

        $data = $_GET;

        $ORDER_Model->update_status($data["id"], $data);
        
        redirect(site_url("admin/order"));
    }
}
