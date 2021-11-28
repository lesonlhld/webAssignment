<?php

namespace Controller\admin;

/**
 * User
 * User for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class User extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();

        $USER_Model = Model('USER_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $end_page = ceil($USER_Model->count(2) / LIMIT);
        $user_list = $USER_Model->get_list(2, 0, $start, LIMIT);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['user_list'] = $user_list;
        $this->data["subview"] = "admin/user/home";
        View("admin/main", $this->data);
    }

    public function trash()
    {
        is_admin_login();

        $USER_Model = Model('USER_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $end_page = ceil($USER_Model->count(2) / LIMIT);
        $user_list = $USER_Model->get_list(2, 1, $start, LIMIT);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['user_list'] = $user_list;
        $this->data["subview"] = "admin/user/trash";
        View("admin/main", $this->data);
    }

    public function add()
    {
        is_admin_login();

        $this->data["subview"] = "admin/user/add";
        View("admin/main", $this->data);
    }

    public function edit()
    {
        is_admin_login();

        if (!isset($_GET['id'])) {
            notFound();
        } else {
            $USER_Model = Model('USER_Model');
            $user = $USER_Model->get($_GET['id']);
            $this->data['data']['user'] = $user;
            $this->data["subview"] = "admin/user/add";
            View("admin/main", $this->data);
        }
    }

    public function view()
    {
        is_admin_login();

        if (!isset($_GET['id'])) {
            notFound();
        } else {
            $USER_Model = Model('USER_Model');
            $user = $USER_Model->get($_GET['id']);
            $this->data['data']['user'] = $user;
            $this->data["subview"] = "admin/user/view";
            View("admin/main", $this->data);
        }
    }

    public function remove()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $USER_Model = Model('USER_Model');
        $USER_Model->update_trash($ids, 1);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/user"));
        }
    }

    public function restore()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $USER_Model = Model('USER_Model');
        $USER_Model->update_trash($ids, 0);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/user/trash"));
        }
    }

    public function delete_permanently()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $USER_Model = Model('USER_Model');
        $USER_Model->delete($ids);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/user/trash"));
        }
    }

    public function change_status()
    {
        is_admin_login();
        $id = $_GET['id'];

        $USER_Model = Model('USER_Model');
        $USER_Model->update_published($id);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/user"));
        }
    }

    public function save()
    {
        is_admin_login();
        $id = $_GET['id'] ?? "-1";

        $data = $_POST;
        if ($data["firstname"] == "") {
            View("", ['msg' => 'Họ không được để trống'], 401);
        } else if ($data["lastname"] == "") {
            View("", ['msg' => 'Tên không được để trống'], 401);
        } else if ($data["email"] == "") {
            View("", ['msg' => 'Email không được để trống'], 401);
        } else {
            if ($id == -1) {
                $USER_Model = Model('USER_Model');
                if ($USER_Model->check_exist_email($data['email']) > 0) {
                    View("", ['msg' => 'Email đã tồn tại'], 401);
                } else {
                    if ($USER_Model->check_exist_phone($data['phone']) > 0) {
                        View("", ['msg' => 'Số điện thoại đã tồn tại'], 401);
                    } else {
                        $data['password'] = '123456';
                        if ($USER_Model->create($data, 2) > 0) {
                            View("", ['msg' => 'Tạo thành công'], 201);
                        } else {
                            View("", ['msg' => 'Có lỗi xảy ra'], 401);
                        }
                    }
                }
            } else {
                $USER_Model = Model('USER_Model');
                if ($USER_Model->check_exist_email($data['email']) > 1) {
                    View("", ['msg' => 'Email đã tồn tại'], 401);
                } else {
                    if ($USER_Model->check_exist_phone($data['phone']) > 1) {
                        View("", ['msg' => 'Số điện thoại đã tồn tại'], 401);
                    } else {
                        if ($USER_Model->update($id, $data) == true) {
                            View("", ['msg' => 'Cập nhật thành công'], 201);
                        } else {
                            View("", ['msg' => 'Có lỗi xảy ra'], 401);
                        }
                    }
                }
            }
        }
    }
}
