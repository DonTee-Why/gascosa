<?php

namespace App\Models;

use App\Database\DBConnection;

class Vote
{
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

    public function __construct()
    {
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

        self::$voter_id = self::clean_data($fields['voters_id']);
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

        return $execute;
    }

    public static function getPresidentialVotes()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.pres_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.pres_candidate_id = candidates.id
            WHERE candidates.position = "Presidential"
            GROUP BY name
            ORDER BY COUNT(votes.pres_candidate_id) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getVicePresVote()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.vice_pres_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.vice_pres_candidate_id = candidates.id
            WHERE candidates.position = "Vice President"
            GROUP BY name
            ORDER BY COUNT(votes.vice_pres_candidate_id) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getGenSecVote()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.gen_sec_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.gen_sec_candidate_id = candidates.id
            WHERE candidates.position = "General Secretary"
            GROUP BY name
            ORDER BY COUNT(votes.gen_sec_candidate_id ) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getAssGenSecVote()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.asst_gen_sec_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.asst_gen_sec_candidate_id = candidates.id
            WHERE candidates.position = "Assistant General Secretary"
            GROUP BY name
            ORDER BY COUNT(votes.asst_gen_sec_candidate_id ) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getTreasurerVote()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.treasurer_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.treasurer_candidate_id = candidates.id
            WHERE position = "Treasurer"
            GROUP BY name
            ORDER BY COUNT(votes.treasurer_candidate_id ) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getFinSecVote()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.fin_sec_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.fin_sec_candidate_id = candidates.id
            WHERE position = "Financial Secretary"
            GROUP BY name
            ORDER BY COUNT(votes.fin_sec_candidate_id ) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getAuditorVote()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.auditor_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.auditor_candidate_id = candidates.id
            WHERE position = "Auditor"
            GROUP BY name
            ORDER BY COUNT(votes.auditor_candidate_id ) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getSocSecVote()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.soc_sec_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.soc_sec_candidate_id = candidates.id
            WHERE position = "Social Secretary"
            GROUP BY name
            ORDER BY COUNT(votes.soc_sec_candidate_id ) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getMedPubSecVote()
    {
        $db = DBConnection::getInstance();
        self::$conn = $db->getConnection();

        $query = 'SELECT candidates.name, COUNT(votes.med_pub_candidate_id) as vote_count
            FROM ' . self::$table . '
            RIGHT JOIN candidates ON votes.med_pub_candidate_id = candidates.id
            WHERE position = "Media & Publicity Secretary"
            GROUP BY name
            ORDER BY COUNT(votes.med_pub_candidate_id ) DESC
        ';

        $stmt = self::$conn->prepare($query);
        $execute = $stmt->execute();

        if (!$execute) {
            return $execute;
        }
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Clean data function
    public static function clean_data($data)
    {
        return htmlspecialchars(strip_tags(trim($data)));
    }
}
