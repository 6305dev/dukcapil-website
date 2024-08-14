<?php

namespace App\Models;

use PDO;

class AdminModel
{
    private $conn;
    private $table = 'articles';

    public function __construct()
    {
        $this->conn = new PDO('sqlite:data.db');
    }

    public function findAll()
    {
        try {
            $stmt = $this->conn->query("SELECT * FROM $this->table ORDER BY created DESC");
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create($params = array())
    {
        try {
            $stmt = $this->conn->prepare('INSERT INTO `' . $this->table . '` (`' . implode('`, `', array_keys($params)) . '`) VALUES (?, ?, ?, ?)');
            $stmt->execute(array_values($params));
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($params, $id)
    {
        try {
            $args = array();
            foreach ($params as $field => $value) {
                $args[] = $field . ' = ?';
            }
            array_push($params, $id);
            $stmt = $this->conn->prepare('UPDATE ' . $this->table . ' SET ' . implode(', ', $args) . ' WHERE id = ?');
            $stmt->execute(array_values($params));
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function findBy($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($row);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function RealString($input)
    {
        return preg_replace('/[^a-zA-Z0-9 ]/', '', $input);
    }
}
