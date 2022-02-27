<?php
namespace App\Models;

class Voter{
    private $conn;
    private $table = 'voters';

    public $id;
    public $name;
    public $email;
    public $status;
    public $date;

    public function __construct($conn){
        $this->conn;
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
        $result = $stmt->get_result()->fetch_assoc();

        return $result;
    }

    // Clean data function
    public function clean_data($data){
        return htmlspecialchars(strip_tags(trim($data)));
    }
}