<?php

namespace App\Models;

use PDO;

class PageModel
{
    protected $conn;
    public function __construct()
    {
        $this->conn = new PDO('sqlite:data.db');
    }

    public function getPages($permalink)
    {
        $stmt = $this->conn->prepare('SELECT * FROM pages WHERE permalink = ?');
        $stmt->execute([$permalink]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
