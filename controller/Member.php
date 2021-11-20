<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Member extends \Controller\Controller
{
    public function myaccount()
    {
        $this->data["subview"] = "client/member/myaccount";
        View("client/main", $this->data);
    }

    public function invoice()
    {
        $this->data["subview"] = "client/member/invoice";
        View("client/main", $this->data);
    }

    public function cart()
    {
        $this->data["subview"] = "client/member/cart";
        View("client/main", $this->data);
    }
}