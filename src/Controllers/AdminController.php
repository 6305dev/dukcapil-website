<?php

namespace App\Controllers;

class AdminController
{
    protected $model;

    public function __construct()
    {
        $this->model = new \App\Models\AdminModel();
    }

    public function Index()
    {
        $params = $this->model->findAll();
        include_once './views/admin.php';
    }

    public function CreateArticle()
    {
        $params = $_POST;
        $this->model->create($params);
    }

    public function UpdateArticle()
    {
        $params = file_get_contents('php://input');
        parse_str($params, $data);
        $this->model->update($data, $data['id']);
    }

    public function RemoveArticle($id)
    {
        $this->model->delete($id);
    }
    public function GetArticle($id)
    {
        $this->model->findBy($id);
    }
}
