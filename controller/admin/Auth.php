<?php

namespace Controller\admin;

/**
 * Auth
 * Auth for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Auth extends \Controller\Controller
{
    public function index()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']  && isset($_SESSION['role']) && $_SESSION['role'] == 2) {
            redirect(site_url("admin/dashboard"));
        } else {
            View("admin/auth/login");
        }
    }

    public function logout()
    {
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
            session_destroy();
        }
        redirect(site_url("admin/auth"));
    }

    public function check_login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $USER_Model = Model('USER_Model');
        $user_login = $USER_Model->login($email, $password, 2);
        print_r($user_login);
        if ($user_login == null) {
            View("", ['msg' => 'Sai email hoặc password'], 401);
        } else {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['email'] = $user_login->email;
            $_SESSION['lastname'] = $user_login->last_name;
            $_SESSION['role'] = $user_login->role_id;
            $_SESSION['id'] = $user_login->id;
        }
    }
}
