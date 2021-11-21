<?php

namespace Controller\admin;

/**
 * Configs
 * Configs for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Configs extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();

        $CONFIGS_Model = Model('CONFIGS_Model');
        $configs = $CONFIGS_Model->get();

        if ($configs != null) {
            $this->data['data']['configs'] = $configs;
        }
        $this->data["subview"] = "admin/configs/home";
        View("admin/main", $this->data);
    }

    public function save()
    {
        is_admin_login();

        $data = $_POST;
        $CONFIGS_Model = Model('CONFIGS_Model');
        if ($CONFIGS_Model->update($data) == true) {
            View("", ['msg' => 'Cập nhật thành công'], 201);
        } else {
            View("", ['msg' => 'Có lỗi xảy ra'], 401);
        }
    }
}
