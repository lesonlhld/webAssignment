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
        is_login();
        $USER_Model = Model('USER_Model');
        $user = $USER_Model->get($_SESSION['id']);
        if ($user->avatar == Null or $user->avatar == "") {
            $user->avatar = "";
        } else {
            $user->avatar = strval($user->avatar);
        }
        $this->data['data']['user'] = $user;
        $this->data["subview"] = "client/member/myaccount";
        View("client/main", $this->data);
    }

    public function update_info()
    {
        is_login();
        $data = $_POST;
        $file = $_FILES;
        if ($data["firstname"] == "") {
            View("", ['msg' => 'Họ không được để trống'], 401);
        } else if ($data["lastname"] == "") {
            View("", ['msg' => 'Tên không được để trống'], 401);
        } else if ($data["birthday"] == "") {
            View("", ['msg' => 'Ngày sinh không được để trống'], 401);
        } else if ($data["gender"] == "") {
            View("", ['msg' => 'Giới tính không được để trống'], 401);
        } else {
            if ($file["avatar"]["size"] > 0) {
                $data["image"] = upload_file("users", "image", "avatar");
            } else if ($data["old_avatar_file_name"] != "") {
                $data["image"] = $data["old_avatar_file_name"];
            } else {
                $data["image"] = null;
            }
            $USER_Model = Model('USER_Model');
            $update_result = $USER_Model->update($_SESSION['id'], $data);  
            View("", ['msg' => 'Cập nhật thành công']);
        }
    }

    public function invoice()
    {
        is_login();
        $this->data["subview"] = "client/member/invoice";
        View("client/main", $this->data);
    }

    public function cart()
    {
        is_login();
        $this->data["subview"] = "client/member/cart";
        View("client/main", $this->data);
    }
}
