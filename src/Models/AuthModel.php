<?php

namespace App\Models;

use PDO;

class AuthModel
{
    private $conn;
    private $table = 'users';

    public function __construct()
    {
        $this->conn = new PDO('sqlite:data.db');
    }

    public function FindUser($username)
    {
        try {
            $stmt = $this->conn->prepare("SELECT username, password, level FROM $this->table WHERE username = ?");
            $stmt->execute([$username]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
