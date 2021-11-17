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
        $this->data["subview"] = "admin/dashboard/home";
        View("admin/main", $this->data);
    }
}
