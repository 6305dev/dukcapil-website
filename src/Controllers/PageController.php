<?php

namespace App\Controllers;

class PageController
{

    private $pages;

    public function __construct()
    {
        $this->pages = new \App\Models\PageModel();
    }

    public function GetPages($permalink)
    {
        $data = $this->pages->getPages($permalink);

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
