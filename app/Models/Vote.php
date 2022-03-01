<?php
namespace App\Models;

use App\Database\DBConnection;

class Vote{
    private static $conn;
    private static $table = 'votes';

    private static $id;
    private static $voter_id;
    private static $pres_candidate_id;
    private static $vice_pres_candidate_id;
    private static $gen_sec_candidate_id;
    private static $asst_gen_sec_candidate_id;
    private static $treasurer_candidate_id;
    private static $fin_sec_candidate_id;
    private static $auditor_candidate_id;
    private static $soc_sec_candidate_id;
    private static $med_pub_candidate_id;
    private static $date_created;

    public function __construct(){
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();
    }

    public static function create($fields)
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();
        
        // SQL query
        $query = 'INSERT INTO ' . self::$table . '
            (voter_id, pres_candidate_id, vice_pres_candidate_id, gen_sec_candidate_id, asst_gen_sec_candidate_id, treasurer_candidate_id, fin_sec_candidate_id, auditor_candidate_id, soc_sec_candidate_id, med_pub_candidate_id, date_created)
            VALUES
            (:voter_id, :pres_candidate_id, :vice_pres_candidate_id, :gen_sec_candidate_id, :asst_gen_sec_candidate_id, :treasurer_candidate_id, :fin_sec_candidate_id, :auditor_candidate_id, :soc_sec_candidate_id, :med_pub_candidate_id, :date)
        ';

        $stmt = self::$conn->prepare($query);

        self::$voter_id = self::clean_data($fields['voter_id']);
        self::$pres_candidate_id = self::clean_data($fields['candidates']['pres_candidate_id']);
        self::$vice_pres_candidate_id = self::clean_data($fields['candidates']['vice_pres_candidate_id']);
        self::$gen_sec_candidate_id = self::clean_data($fields['candidates']['gen_sec_candidate_id']);
        self::$asst_gen_sec_candidate_id = self::clean_data($fields['candidates']['asst_gen_sec_candidate_id']);
        self::$treasurer_candidate_id = self::clean_data($fields['candidates']['treasurer_candidate_id']);
        self::$fin_sec_candidate_id = self::clean_data($fields['candidates']['fin_sec_candidate_id']);
        self::$auditor_candidate_id = self::clean_data($fields['candidates']['auditor_candidate_id']);
        self::$soc_sec_candidate_id = self::clean_data($fields['candidates']['soc_sec_candidate_id']);
        self::$med_pub_candidate_id = self::clean_data($fields['candidates']['med_pub_candidate_id']);
        self::$date_created = self::clean_data($fields['date_created']);

        $stmt->bindParam(':voter_id', self::$voter_id);
        $stmt->bindParam(':pres_candidate_id', self::$pres_candidate_id);
        $stmt->bindParam(':vice_pres_candidate_id', self::$vice_pres_candidate_id);
        $stmt->bindParam(':gen_sec_candidate_id', self::$gen_sec_candidate_id);
        $stmt->bindParam(':asst_gen_sec_candidate_id', self::$asst_gen_sec_candidate_id);
        $stmt->bindParam(':treasurer_candidate_id', self::$treasurer_candidate_id);
        $stmt->bindParam(':fin_sec_candidate_id', self::$fin_sec_candidate_id);
        $stmt->bindParam(':auditor_candidate_id', self::$auditor_candidate_id);
        $stmt->bindParam(':soc_sec_candidate_id', self::$soc_sec_candidate_id);
        $stmt->bindParam(':med_pub_candidate_id', self::$med_pub_candidate_id);
        $stmt->bindParam(':date', self::$date_created);

        $execute = $stmt->execute();

        $result = $stmt->fetchAll();

        if ($execute) {
            return $result;
        }else{
            return $execute;
        }
    }

    private static function update($email)
    {
        # code...
    }

    // Clean data function
    public function clean_data($data){
        return htmlspecialchars(strip_tags(trim($data)));
    }
}