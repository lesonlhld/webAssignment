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
}
