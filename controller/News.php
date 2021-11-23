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
            $this->data['data']['news'] = $news;
            $this->data["subview"] = "client/news/detail";
            View("client/main", $this->data);
        }
    }
}
