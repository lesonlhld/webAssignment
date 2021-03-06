<?php

namespace Controller\admin;

/**
 * News
 * News for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class News extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();

        $NEWS_Model = Model('NEWS_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $end_page = ceil($NEWS_Model->count() / LIMIT);
        $news_list = $NEWS_Model->get_list($start, LIMIT);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['news_list'] = $news_list;
        $this->data["subview"] = "admin/news/home";
        View("admin/main", $this->data);
    }

    public function add()
    {
        is_admin_login();
        $this->data["subview"] = "admin/news/add";
        View("admin/main", $this->data);
    }

    public function edit()
    {
        is_admin_login();

        if (!isset($_GET['id'])) {
            notFound();
        } else {
            $NEWS_Model = Model('NEWS_Model');
            $news = $NEWS_Model->get($_GET['id']);

            $this->data['data']['news'] = $news;
            $this->data["subview"] = "admin/news/add";
            View("admin/main", $this->data);
        }
    }

    public function view()
    {
        is_admin_login();

        if (!isset($_GET['id'])) {
            notFound();
        } else {
            $NEWS_Model = Model('NEWS_Model');
            $news = $NEWS_Model->get($_GET['id']);

            $this->data['data']['news'] = $news;
            $this->data["subview"] = "admin/news/view";
            View("admin/main", $this->data);
        }
    }

    public function remove()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $NEWS_Model = Model('NEWS_Model');
        $NEWS_Model->update_trash($ids, 1);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/news"));
        }
    }

    public function change_status()
    {
        is_admin_login();
        $id = $_GET['id'];

        $NEWS_Model = Model('NEWS_Model');
        $NEWS_Model->update_published($id);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/news"));
        }
    }

    public function save()
    {
        is_admin_login();
        $id = $_GET['id'] ?? "-1";

        $data = $_POST;
        if ($data["title"] == "") {
            View("", ['msg' => 'Ti??u ????? kh??ng ???????c ????? tr???ng'], 401);
        } else if ($data["short_content"] == "") {
            View("", ['msg' => 'N???i dung ng???n kh??ng ???????c ????? tr???ng'], 401);
        } else if ($data["content"] == "") {
            View("", ['msg' => 'N???i dung kh??ng ???????c ????? tr???ng'], 401);
        } else {
            $data['image'] = upload_file("news", "image", "image");
            $data['image'] = $data['image'] != "" ? $data['image'] : $data['old_image'];
            if ($id == -1) {
                $NEWS_Model = Model('NEWS_Model');
                if ($NEWS_Model->create($data) > 0) {
                    View("", ['msg' => 'T???o th??nh c??ng'], 201);
                } else {
                    View("", ['msg' => 'C?? l???i x???y ra'], 401);
                }
            } else {
                $NEWS_Model = Model('NEWS_Model');
                if ($NEWS_Model->update($id, $data) == true) {
                    View("", ['msg' => 'C???p nh???t th??nh c??ng'], 201);
                } else {
                    View("", ['msg' => 'C?? l???i x???y ra'], 401);
                }
            }
        }
    }
}
