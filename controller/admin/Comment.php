<?php

namespace Controller\admin;

/**
 * News
 * News for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Comment extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();

        $COMMENT_Model = Model('COMMENT_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        
        if (!isset($_GET['product_id']) || $_GET['product_id'] == "") {
            $comment_list = $COMMENT_Model->get_list($start, LIMIT);
            $end_page = ceil($COMMENT_Model->count() / LIMIT);
        } else {
            $comment_list = $COMMENT_Model->get_list_by_product($_GET['product_id'], $start, LIMIT);
            $end_page = ceil($COMMENT_Model->count_by_product($_GET['product_id']) / LIMIT);
        }

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['comment_list'] = $comment_list;
        $this->data["subview"] = "admin/comment/home";
        View("admin/main", $this->data);
    }

    public function view()
    {
        is_admin_login();

        $COMMENT_Model = Model('COMMENT_Model');
        $comment = $COMMENT_Model->get($_GET['id']);

        $this->data['data']['comment'] = $comment;
        $this->data["subview"] = "admin/comment/view";
        View("admin/main", $this->data);
    }

    public function edit()
    {
        is_admin_login();

        if (!isset($_GET['id'])) {
            notFound();
        } else {
            $COMMENT_Model = Model('COMMENT_Model');
            $comment = $COMMENT_Model->get($_GET['id']);
            $this->data['data']['comment'] = $comment;
            $this->data["subview"] = "admin/comment/add";
            View("admin/main", $this->data);
        }
    }

    public function save()
    {
        is_admin_login();
        $id = $_GET['id'] ?? "-1";

        $data = $_POST;
        if ($data["rate"] == "") {
            View("", ['msg' => 'Rate không được để trống'], 401);
        } else if ($data["content"] == "") {
            View("", ['msg' => 'Nội dung không được để trống'], 401);
        } else if ($data["rate"] < "1" || $data["rate"] > "5") {
            View("", ['msg' => 'Rate phải từ 1 đến 5'], 401);
        } else {
            if ($id == -1) {
                # create comment
            } else {
                # update comment
                $COMMENT_Model = Model('COMMENT_Model');
                if ($COMMENT_Model->update($id, $data) == true) {
                    View("", ['msg' => 'Cập nhật thành công'], 201);
                } else {
                    View("", ['msg' => 'Có lỗi xảy ra'], 401);
                }
            }
        }
    }

    public function remove()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $COMMENT_Model = Model('COMMENT_Model');
        $COMMENT_Model->delete($ids);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/comment"));
        }
    }
}
