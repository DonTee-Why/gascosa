<?php
namespace App\Models;

use App\Database\DBConnection;

class Candidate{
    private static $instance;
    private static $conn;
    private static $table = 'candidates';

    public static $id;
    public static $name;
    public static $position;

    public function __construct(){
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();
    }

    public static function find($pos)
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        // SQL query
        $query = 'SELECT * FROM ' . self::$table . '
            WHERE
            position = :position
        ';

        $stmt = self::$conn->prepare($query);

        self::$position = self::clean_data($pos);
        $stmt->bindParam(':position', $pos);

        $execute = $stmt->execute();

        $result = $stmt->fetchAll();

        if ($execute) {
            return $result;
        }else{
            return $execute;
        }
    }

    // Clean data function
    private static function clean_data($data){
        return htmlspecialchars(strip_tags(trim($data)));
    }
}