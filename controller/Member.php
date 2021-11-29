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

    public function order()
    {
        is_login();
        $ORDER_Model = Model('ORDER_Model');
        $order_list = $ORDER_Model->get_all($_SESSION['id']);
        $this->data['data']['order_list'] = $order_list;
        $this->data["subview"] = "client/member/order";
        View("client/main", $this->data);
    }

    public function order_item()
    {
        is_login();
        $code = $_GET['code'];
        $ORDER_ITEM_Model = Model('ORDER_ITEM_Model');
        $ORDER_Model = Model('ORDER_Model');
        $order_items = $ORDER_ITEM_Model->get_by_order_id($code);
        $order = $ORDER_Model->get_by_user($_SESSION['id'], $code);
        $this->data['data']['order_items'] = $order_items;
        $this->data['data']['order'] = $order;
        $this->data["subview"] = "client/member/order_item";
        View("client/main", $this->data);
    }
    
    public function changepass()
    {
        is_login();
        $USER_Model = Model('USER_Model');
        $user = $USER_Model -> get($_SESSION['id']);
        $this->data['data']['user'] = $user;
        $this->data["subview"] = "client/member/changepass";
        View("client/main",$this->data);
    }

    public function update_pass()
    {
        is_login();
        $data = $_POST;
        $USER_Model = Model('USER_Model');
        $info_pass = $USER_Model->get_password($_SESSION['id']);
        if (hashpass($data["oldpassword"]) != $info_pass)
            {
                View("",['msg'=>'Nhập sai mật khẩu cũ'],401);
            }
        else
            if ($data["newpassword"] != $data["passwordConfirm"]) {
                    View("",['msg' => 'Mật khẩu mới xác nhận không giống nhau'],401);
            }
                else 
                { 
                    $newpass= $USER_Model->update_password($_SESSION['id'],$data['newpassword']);
                    View("",['msg'=>'Đổi mật khẩu thành công']);
                }
    }
}
