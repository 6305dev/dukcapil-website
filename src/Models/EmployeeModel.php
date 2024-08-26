<?php

namespace App\Models;

use PDO;

class EmployeeModel
{
    private $conn;
    private $table = 'employees';

    public function __construct()
    {
        $this->conn = new PDO('sqlite:data.db');
    }

    public function findBy($table, $id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($row);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create($table, $params = array())
    {
        try {
            $stmt = $this->conn->prepare('INSERT INTO `' . $table . '` (`' . implode('`, `', array_keys($params)) . '`) VALUES (?, ?, ?)');
            $stmt->execute(array_values($params));
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
