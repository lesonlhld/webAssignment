<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Auth extends \Controller\Controller
{
    public function login()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            redirect(site_url("home"));
        } else {
            $this->data["subview"] = "client/auth/login";
            View("client/main", $this->data);
        }
    }

    public function register()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            redirect(site_url("home"));
        } else {
            $this->data["subview"] = "client/auth/register";
            View("client/main", $this->data);
        }
    }

    public function logout()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            session_destroy();
        }
        redirect(site_url("auth/login"));
    }

    public function check_login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $USER_Model = Model('USER_Model');
        $user_login = $USER_Model->login($username, $password);
        if ($user_login == null) {
            View("", ['msg' => 'Sai username hoặc password'], 401);
        } else {
            $_SESSION['is_logged_in'] = true;
        }
    }

    public function check_register()
    {
        $data = $_POST;

        if ($data["firstname"] == "") {
            View("", ['msg' => 'Họ không được để trống'], 401);
        } else if ($data["lastname"] == "") {
            View("", ['msg' => 'Tên không được để trống'], 401);
        } else if ($data["username"] == "") {
            View("", ['msg' => 'Tên đăng nhập không được để trống'], 401);
        } else if ($data["email"] == "") {
            View("", ['msg' => 'Email không được để trống'], 401);
        } else if ($data["password"] == "") {
            View("", ['msg' => 'Mật khẩu không được để trống'], 401);
        } else if ($data["passwordConfirm"] == "") {
            View("", ['msg' => 'Mật khẩu xác nhận không được để trống'], 401);
        } else if ($data["birthday"] == "") {
            View("", ['msg' => 'Ngày sinh không được để trống'], 401);
        } else if ($data["password"] != $data["passwordConfirm"]) {
            View("", ['msg' => 'Mật khẩu xác nhận không trùng khớp'], 401);
        } else {
            $USER_Model = Model('USER_Model');
            if ($USER_Model->check_exist_username($data['username'])) {
                View("", ['msg' => 'Tên đăng nhập đã tồn tại'], 401);
            } else {
                $data['role_id'] = 1;
                if ($USER_Model->check_exist_email($data['email'])) {
                    View("", ['msg' => 'Email đã tồn tại'], 401);
                } else {
                    if ($USER_Model->register($data) > 0) {
                        $_SESSION['is_logged_in'] = true;
                    } else {
                        View("", ['msg' => 'Có lỗi xảy ra'], 401);
                    }
                }
            }
        }
    }
}