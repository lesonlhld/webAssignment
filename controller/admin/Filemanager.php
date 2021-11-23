<?php

namespace Controller\admin;

/**
 * Filemanager
 * Filemanager for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Filemanager extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();
        $this->data["subview"] = "admin/filemanager/home";
        View("admin/main", $this->data);
    }

    public function upload()
    {
        $folder = $this->param[0];
        $file_name = upload_file($folder, "image", "upload");
        $url = base_url('source/' . $folder . '/' . $file_name);
        $function_number = $_GET['CKEditorFuncNum'];
        $message = '';
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }
}
