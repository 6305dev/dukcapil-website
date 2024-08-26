<?php

namespace App\Controllers;

class EmployeeController
{

    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\EmployeeModel();
    }

    public function GetEmployees($id)
    {
        if ($id >= 1 && $id <= 16) {
            $params =  $this->model->findBy('employees', $id);
        }
    }

    public function RateEmployees()
    {
        return $this->model->create('employees_rating', $_POST);
    }

    public function Index($id)
    {
        if ($id >= 1 && $id <= 16) {
            $params =  $this->model->findBy('employees', $id);
            include_once './views/review.php';
        } else {
            header('location: /');
            exit();
        }
    }
}
