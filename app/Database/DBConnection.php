<?php

namespace App\Database;

use \PDO;
use \PDOException;

class DBConnection
{
    private static $instance = null;

    private $host = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $db_name = DB_NAME;
    private $conn;

    private function __construct()
    {
        try {
            $conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $this->conn = $conn;

        return $conn;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DBConnection();
        }

        return  new DBConnection();
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
