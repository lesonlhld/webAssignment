<?php

namespace Controller\admin;

/**
 * Customer
 * Customer for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Customer extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();
        $this->data["subview"] = "admin/customer/home";
        View("admin/main", $this->data);
    }
}
