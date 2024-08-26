<?php

namespace App\Controllers;

class PageController
{

    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\PageModel();
    }

    public function GetPages($permalink)
    {
        $data = $this->model->getPages($permalink);

        if (!$data) {
            header('location: /');
            exit();
        } else {
            $this->render('page', ['title' => 'DISDUKCAPIL TAPIN - ' . strtoupper($data['title']), 'content' => $data['content']]);
        }
    }

    public function render($paging, $params = [])
    {
        include_once './views/layouts/header.php';
        include_once './views/' . $paging . '.php';
        include_once './views/layouts/footer.php';
    }
}
