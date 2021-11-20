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

        $USER_Model = Model('USER_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $end_page = ceil($USER_Model->count() / LIMIT);
        $user_list = $USER_Model->get_user(1, $start, LIMIT);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['user_list'] = $user_list;
        $this->data["subview"] = "admin/customer/home";
        View("admin/main", $this->data);
    }

    public function remove()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $USER_Model = Model('USER_Model');
        $USER_Model->update_trash($ids, 1);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/customer"));
        }
    }
}
