<?php

namespace Controller\admin;

/**
 * Filemanager
 * Filemanager for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Filemanager extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();
        $this->data["subview"] = "admin/filemanager/home";
        View("admin/main", $this->data);
    }
}
