<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Home extends \Controller\Controller
{
    public function index()
    {
        // $this->redirect($this->site_url('admin/dashboard'));
        $this->View("index");
        // echo BASE_URL;
        // $this->notFound();
        // $this->redirect("http://localhost/webAssignment/admin/dashboard");
    }

    public function get_city()
    {
        $USER_Model = $this->Model('CITY_Model');
        $this->jsonResponse = true;
        $this->View('', $USER_Model->get_city());
    }
}
