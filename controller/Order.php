<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Order extends \Controller\Controller
{
    public function add(){
        is_login();
        print_r($_POST);
    }
}
