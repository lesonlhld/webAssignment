<?php
    namespace Controller\admin;

    class Category extends \Controller\Controller
    {
        public function index()
        {
            is_admin_login();

            $CATEGORY_Model = Model('CATEGORY_Model');
            $page = $_GET['page'] ?? 1;
            $start = ((int)$page - 1) * 10;
            $end_page = ceil($CATEGORY_Model->count() / LIMIT);
            $category_list = $CATEGORY_Model->get_list_admin($start, LIMIT);

            $this->data['data']['page'] = $page;
            $this->data['data']['end_page'] = $end_page;
            $this->data['data']['category_list'] = $category_list;
            $this->data["subview"] = "admin/category/home";
            View("admin/main", $this->data);
        }

        public function view()
        {
            is_admin_login();

            if (!isset($_GET['id'])) {
                notFound();
            } else {
                $CATEGORY_Model = Model('CATEGORY_Model');
                $category = $CATEGORY_Model->get($_GET['id']);
                $this->data['data']['category'] = $category;
                $this->data["subview"] = "admin/category/view";
                View("admin/main", $this->data);
            }
        }

        public function remove()
        {
            is_admin_login();
            $ids = $_POST['ids'] ?? [$_GET['id']] ?? [];
            $CATEGORY_Model = Model('CATEGORY_Model');
            $CATEGORY_Model->delete_category($ids);
            if (isset($_GET['id'])) {
                redirect(site_url("admin/category"));
            }
        }
        public function add()
        {
            is_admin_login();
            $this->data["subview"] = "admin/category/add";
            View("admin/main",$this->data);
        }
        public function save()
        {
            is_admin_login();
            $id = $_GET['id'] ?? "-1";
            $data = $_POST;
            if ($data["category_name"] == "") {
                View("", ['msg' => 'Name không được để trống'], 401);
            } else {
                if ($id == -1) {
                    $CATEGORY_Model = Model('CATEGORY_Model');
            
                        if ($CATEGORY_Model->check_exist_name($data['category_name']) > 0) {
                            View("", ['msg' => 'Name đã tồn tại'], 401);
                        } else {
                                if ($CATEGORY_Model->create($data) > 0) {
                                    View("", ['msg' => 'Tạo thành công'], 201);
                                    } else {
                                        View("", ['msg' => 'Có lỗi xảy ra'], 401);
                                    }
                                }
                    }
                    
                else {
                    $CATEGORY_Model = Model('CATEGORY_Model');
                    if ($CATEGORY_Model->check_exist_name($data['category_name']) > 0) {
                            View("", ['msg' => 'Name đã tồn tại'], 401);
                        } else {
                            if ($CATEGORY_Model->update($id, $data) == true) {
                                View("", ['msg' => 'Cập nhật thành công'], 201);
                            } else {
                                View("", ['msg' => 'Có lỗi xảy ra'], 401);
                            }
                        }
                    }
                }
            
        }

        public function edit()
        {
            is_admin_login();

            if (!isset($_GET['id'])) {
                notFound();
            } else {
                $CATEGORY_Model = Model('CATEGORY_Model');
                $category = $CATEGORY_Model->get($_GET['id']);
                $this->data['data']['category'] = $category;
                $this->data["subview"] = "admin/category/add";
                View("admin/main", $this->data);
            }
        }

    }
