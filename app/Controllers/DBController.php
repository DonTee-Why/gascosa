<?php

namespace App\Controllers;

use App\Database\DBConnection;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Voter;
use PDOException;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Session\Session;

class DBController
{
    // Install the database
    public function index(RouteCollection $routes)
    {
        try {
            $db = DBConnection::getInstance();
            $conn = $db->getConnection();
            $conn->beginTransaction();

            $query = "CREATE TABLE candidates (
                id int(11) NOT NULL,
                name varchar(100) NOT NULL,
                position varchar(150) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `voters`

                CREATE TABLE voters (
                    id int(11) NOT NULL,
                    name varchar(150) NOT NULL,
                    email varchar(75) NOT NULL,
                    pic varchar(250) NOT NULL,
                    status tinyint(1) NOT NULL DEFAULT '0'
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `votes`

                CREATE TABLE votes (
                    id int(11) NOT NULL,
                    voter_id int(11) NOT NULL,
                    pres_candidate_id int(11) NOT NULL,
                    vice_pres_candidate_id int(11) NOT NULL,
                    gen_sec_candidate_id int(11) NOT NULL,
                    asst_gen_sec_candidate_id int(11) NOT NULL,
                    treasurer_candidate_id int(11) NOT NULL,
                    fin_sec_candidate_id int(11) NOT NULL,
                    auditor_candidate_id int(11) NOT NULL,
                    soc_sec_candidate_id int(11) NOT NULL,
                    med_pub_candidate_id int(11) NOT NULL,
                    date_created datetime NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `candidates`

                ALTER TABLE candidates
                    ADD PRIMARY KEY ('id');

--
-- Indexes for table `voters`

                ALTER TABLE voters
                    ADD PRIMARY KEY ('id'),
                    ADD UNIQUE KEY email ('email');
--
-- Indexes for table `votes`

                ALTER TABLE votes
                    ADD PRIMRY KEY (`id`),
                    ADD KEY candidate_id ('pres_candidate_id'),
                    ADD KEY vice_pres_candidate_id (vice_pres_candidate_id),
                    ADD KEY gen_sec_candidate_id (gen_sec_candidate_id),
                    ADD KEY asst_gen_sec_candidate_id (asst_gen_sec_candidate_id),
                    ADD KEY treasurer_candidate_id (treasurer_candidate_id),
                    ADD KEY fin_sec_candidate_id (fin_sec_candidate_id),
                    ADD KEY auditor_candidate_id (auditor_candidate_id),
                    ADD KEY soc_sec_candidate_id (soc_sec_candidate_id),
                    ADD KEY med_pub_candidate_id (med_pub_candidate_id),
                    ADD KEY voter_id (voter_id);

--
-- AUTO_INCREMENT for table `candidates`

                ALTER TABLE candidates
                    MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `voters`

                ALTER TABLE voters
                    MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `votes`

                ALTER TABLE votes
                    MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
                    
--
-- Constraints for table `votes`

                ALTER TABLE votes
                    ADD CONSTRAINT 'votes_ibfk_10' FOREIGN KEY ('med_pub_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_11' FOREIGN KEY ('voter_id') REFERENCES 'voters' ('id') ON DELETE CASCADE ON UPDATE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_2' FOREIGN KEY ('pres_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_3' FOREIGN KEY ('vice_pres_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_4' FOREIGN KEY ('gen_sec_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_5' FOREIGN KEY ('asst_gen_sec_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_6' FOREIGN KEY ('treasurer_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_7' FOREIGN KEY ('fin_sec_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_8' FOREIGN KEY ('auditor_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE,
                    ADD CONSTRAINT 'votes_ibfk_9' FOREIGN KEY ('soc_sec_candidate_id') REFERENCES 'candidates' ('id') ON DELETE CASCADE;
            ";

            $conn->exec($query);

            $result = $conn->commit();
            if ($result) {
                $message = "Tables installed successfully. You can proceed to run the project.";
                require_once APP_ROOT . '/views/install.php';
            }
        } catch (PDOException $e) {
            $conn->rollBack();
            $message = "Error: " . $e->getMessage();
            require_once APP_ROOT . '/views/install.php';
        }
    }
}
