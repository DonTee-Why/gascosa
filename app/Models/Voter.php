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

        $email = filter_var($this->clean_data($email), FILTER_SANITIZE_EMAIL);;
        $stmt->bindParam(':email', $email);

        $execute = $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->email = $result['email'];
        $this->status = $result['status'];
        $this->date = $result['date'];

        return $execute;
    }

    // Clean data function
    public function clean_data($data){
        return htmlspecialchars(strip_tags(trim($data)));
    }
}