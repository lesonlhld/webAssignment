<?php

namespace Controller\admin;

/**
 * Dashboard
 * Dashboard for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Dashboard extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();
        $NEWS_Model = Model('NEWS_Model');
        $PRODUCT_Model = Model('PRODUCT_Model');
        $USER_Model = Model('USER_Model');
        $ORDER_Model = Model('ORDER_Model');
        
        $news_number = $NEWS_Model->count();
        $products_number = $PRODUCT_Model->count();
        $customers_number = $USER_Model->count();
        $orders_number = $ORDER_Model->count();

        $this->data['data']['news_number'] = $news_number;
        $this->data['data']['products_number'] = $products_number;
        $this->data['data']['customers_number'] = $customers_number;
        $this->data['data']['orders_number'] = $orders_number;
        $this->data["subview"] = "admin/dashboard/home";
        View("admin/main", $this->data);
    }
}
