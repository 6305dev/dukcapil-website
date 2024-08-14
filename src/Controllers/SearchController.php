<?php

namespace App\Controllers;

class SearchController
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\SearchModel();
    }

    public function SearchItem()
    {
        $keyword = $_POST['keyword'];
        $data = $this->model->SearchByTags('keywords', $keyword);
        echo json_encode($data);
    }
}
