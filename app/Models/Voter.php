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
    public $pic;

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

        $email = filter_var($this->clean_data($email), FILTER_SANITIZE_EMAIL);
        $stmt->bindParam(':email', $email);

        $execute = $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->email = $result['email'];
        $this->status = $result['status'];

        return $execute;
    }

    public function update($id, $pic)
    {
        
        // SQL query
        $query = 'UPDATE ' . $this->table . '
            SET pic = :pic
            WHERE id = :id
        ';

        $stmt = $this->conn->prepare($query);

        $id = $this->clean_data($id);
        $pic = $this->clean_data($pic);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pic', $pic);

        $execute = $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->email = $result['email'];
        $this->pic = $result['pic'];
        $this->status = $result['status'];

        return $execute;
    }

    // Clean data function
    public function clean_data($data){
        return htmlspecialchars(strip_tags(trim($data)));
    }
}