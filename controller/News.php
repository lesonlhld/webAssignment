<?php

namespace Controller;


/**
 * Home
 * Homepage for client
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class News extends \Controller\Controller
{
    public function index()
    {   
        $NEWS_Model = Model('NEWS_Model');
        $page = $_GET['page'] ?? 1;
        $start = ((int)$page - 1) * 10;
        $end_page = ceil($NEWS_Model->count() / LIMIT);
        $news_list = $NEWS_Model->get_list_active($start, LIMIT);

        $this->data['data']['page'] = $page;
        $this->data['data']['end_page'] = $end_page;
        
      
        $this->data['data']['news_list']=$news_list;
        $this->data["subview"] = "client/news/list";
        View("client/main", $this->data);
    }

    public function detail()
    {
        $slug = $this->param[0];

        $NEWS_Model = Model('NEWS_Model');
        $news = $NEWS_Model->get_by_slug($slug);

        if ($news == null) {
            notFound();
        } else {
            $news = $NEWS_Model->get($_GET['id']);
            $this->data['data']['news'] = $news;
            $this->data["subview"] = "client/news/detail";
            View("client/main", $this->data);
        }
    }
}
