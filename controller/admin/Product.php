<?php

namespace Controller\admin;

/**
 * Product
 * Product for admin
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Product extends \Controller\Controller
{
    public function index()
    {
        is_admin_login();

        $PRODUCT_Model = Model('PRODUCT_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $end_page = ceil($PRODUCT_Model->count() / LIMIT);
        $product_list = $PRODUCT_Model->get_list(0, $start, LIMIT);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['product_list'] = $product_list;
        $this->data["subview"] = "admin/product/home";
        View("admin/main", $this->data);
    }

    public function trash()
    {
        is_admin_login();

        $PRODUCT_Model = Model('PRODUCT_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $end_page = ceil($PRODUCT_Model->count() / LIMIT);
        $product_list = $PRODUCT_Model->get_list(1, $start, LIMIT);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        $this->data['data']['product_list'] = $product_list;
        $this->data["subview"] = "admin/product/trash";
        View("admin/main", $this->data);
    }

    public function add()
    {
        is_admin_login();
        $CATEGORY_Model = Model('CATEGORY_Model');
        $category_list = $CATEGORY_Model->get_list();

        $this->data['data']['category_list'] = $category_list;
        $this->data["subview"] = "admin/product/add";
        View("admin/main", $this->data);
    }

    public function edit()
    {
        is_admin_login();

        if (!isset($_GET['id'])) {
            notFound();
        } else {
            $PRODUCT_Model = Model('PRODUCT_Model');
            $product = $PRODUCT_Model->get($_GET['id']);

            $CATEGORY_Model = Model('CATEGORY_Model');
            $category_list = $CATEGORY_Model->get_list();

            $this->data['data']['category_list'] = $category_list;
            $this->data['data']['product'] = $product;
            $this->data["subview"] = "admin/product/add";
            View("admin/main", $this->data);
        }
    }

    public function view()
    {
        is_admin_login();

        if (!isset($_GET['id'])) {
            notFound();
        } else {
            $PRODUCT_Model = Model('PRODUCT_Model');
            $product = $PRODUCT_Model->get($_GET['id']);

            $CATEGORY_Model = Model('CATEGORY_Model');
            $category_list = $CATEGORY_Model->get_list();

            $this->data['data']['category_list'] = $category_list;
            $this->data['data']['product'] = $product;
            $this->data["subview"] = "admin/product/view";
            View("admin/main", $this->data);
        }
    }

    public function remove()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $PRODUCT_Model = Model('PRODUCT_Model');
        $PRODUCT_Model->update_trash($ids, 1);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/product"));
        }
    }

    public function restore()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $PRODUCT_Model = Model('PRODUCT_Model');
        $PRODUCT_Model->update_trash($ids, 0);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/product/trash"));
        }
    }

    public function delete_permanently()
    {
        is_admin_login();
        $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];

        $PRODUCT_Model = Model('PRODUCT_Model');
        $PRODUCT_Model->delete($ids);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/product/trash"));
        }
    }

    public function change_status()
    {
        is_admin_login();
        $id = $_GET['id'];

        $PRODUCT_Model = Model('PRODUCT_Model');
        $PRODUCT_Model->update_published($id);
        if (isset($_GET['id'])) {
            redirect(site_url("admin/product"));
        }
    }

    public function save()
    {
        is_admin_login();
        $id = $_GET['id'] ?? "-1";

        $data = $_POST;
        if ($data["name"] == "") {
            View("", ['msg' => 'Tên không được để trống'], 401);
        } else if ($data["price"] == "") {
            View("", ['msg' => 'Giá không được để trống'], 401);
        } else if ($data["quantity"] == "") {
            View("", ['msg' => 'Số lượng không được để trống'], 401);
        } else if ($data["category_id"] < 0) {
            View("", ['msg' => 'Phân loại không được để trống'], 401);
        } else {
            $attribute = [];
            if (isset($data["attribute_name"])) {
                foreach ($data["attribute_name"] as $index => $name) {
                    if (!empty($name)) {
                        $attribute[$index]["name"] = $data["attribute_name"][$index];
                        $attribute[$index]["value"] = $data["attribute_value"][$index];
                    }
                }
            }
            unset($data["attribute_name"]);
            unset($data["attribute_value"]);
            $data['attribute'] = json_encode($attribute);

            $data['image'] = upload_file("products", "image", "image");
            $data['image'] = $data['image'] != "" ? $data['image'] : $data['old_image'];
            if ($id == -1) {
                $PRODUCT_Model = Model('PRODUCT_Model');
                if ($PRODUCT_Model->create($data) > 0) {
                    View("", ['msg' => 'Tạo thành công'], 201);
                } else {
                    View("", ['msg' => 'Có lỗi xảy ra'], 401);
                }
            } else {
                $PRODUCT_Model = Model('PRODUCT_Model');
                if ($PRODUCT_Model->update($id, $data) == true) {
                    View("", ['msg' => 'Cập nhật thành công'], 201);
                } else {
                    View("", ['msg' => 'Có lỗi xảy ra'], 401);
                }
            }
        }
    }
}
