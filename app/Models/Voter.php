<?php
namespace App\Models;

use App\Database\DBConnection;

class Voter{
    private $conn;
    private $table = 'voters';

    public $id;
    public $name;
    public $email;
    public $status;
    public $date;

    public function __construct(){
        $db = DBConnection::getInstance();
        $this->conn = $db->getConnection();
    }

    public function find($email)
    {
        
        // SQL query
        $query = 'SELECT * FROM ' . $this->table . '
            WHERE
            email = :email
        ';

        $stmt = $this->conn->prepare($query);

        $email = $this->clean_data($email);
        $stmt->bindParam(':id_number', $email);

        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    // Clean data function
    public function clean_data($data){
        return htmlspecialchars(strip_tags(trim($data)));
    }
}