<?php

namespace App\Database;

use mysqli;
use Dotenv\Dotenv;

class MySQL
{
    protected $conn;

    private function dotenv()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }

    public function __construct()
    {
        $this->dotenv();
        $this->conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    }

    public function connect()
    {
        return $this->conn;
    }
}
