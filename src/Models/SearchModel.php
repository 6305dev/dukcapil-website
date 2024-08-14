<?php

namespace App\Models;

use PDO;

class SearchModel
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new PDO('sqlite:data.db');
    }

    public function SearchByTags($table, $keyword)
    {
        $query = $this->RealString($keyword);
        $sql = "SELECT title, permalink, category FROM $table WHERE tags LIKE '%$query%'";
        $res = $this->conn->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function RealString($input)
    {
        return preg_replace('/[^a-zA-Z0-9 ]/', '', $input);
    }
}
