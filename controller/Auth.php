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
        $this->data["subview"] = "client/auth/login";
        View("client/main", $this->data);
    }

    public function register()
    {
        $this->data["subview"] = "client/auth/register";
        View("client/main", $this->data);
    }

    public function logout()
    {
        redirect(site_url("home"));
    }
}
