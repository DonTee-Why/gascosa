<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\Voter;
use App\Services\FileUploader;
use DateTime;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\String\Slugger\SluggerInterface;

class VoteController
{
    private $session;

    public function index(RouteCollection $routes)
    {
        $this->session = new Session();
        $loggedIn = $this->session->get('loggedIn', null);
        if (is_null($loggedIn)) {
            header('location: /' . URL_SUBFOLDER);
        } else {
            $email = $this->session->get('email', null);
            $voter = new Voter();
            $voter->find($email);
            if ($voter->status > 0) {
                header('location: /' . URL_SUBFOLDER . '/results');
            }
            $president = Candidate::find('Presidential');
            $vicePresident = Candidate::find('Vice President');
            $genSec = Candidate::find('General Secretary');
            $asstGenSec = Candidate::find('Assistant General Secretary');
            $treasurer = Candidate::find('Treasurer');
            $finSec = Candidate::find('Financial Secretary');
            $auditor = Candidate::find('Auditor');
            $sosSec = Candidate::find('Social Secretary');
            $medPubSec = Candidate::find('Media & Publicity Secretary');
            require_once APP_ROOT . '/views/vote.php';
        }
    }

    // Sign in the voter
    public function voteAction(RouteCollection $routes)
    {
        $request = Request::createFromGlobals();
        if ($request->getMethod() != 'POST') {
            header('location: /' . URL_SUBFOLDER);
        }

        // Get voter_id from session
        $this->session = new Session();
        $voter_id = $this->session->get('loggedIn', null);

        // Gather candidates id
        $candidates = [
            "pres_candidate_id" => $request->get('presidentialRadio'),
            "vice_pres_candidate_id" => $request->get('vicePresRadio'),
            "gen_sec_candidate_id" => $request->get('genSecRadio'),
            "asst_gen_sec_candidate_id" => $request->get('asstGenSecRadio'),
            "treasurer_candidate_id" => $request->get('treasurerRadio'),
            "fin_sec_candidate_id" => $request->get('finSecRadio'),
            "auditor_candidate_id" => $request->get('auditorRadio'),
            "soc_sec_candidate_id" => $request->get('socialSecRadio'),
            "med_pub_candidate_id" => $request->get('medPubSecRadio')
        ];

        $currentDate = new DateTime();
        $date_created =  $currentDate->format('Y-m-d H:i:s');

        // Handle image file
        $pic = $request->files->get('pic');
        if (!is_null($pic)) {
            $slugger = new AsciiSlugger();
            $fileUploader = new FileUploader('uploads', $slugger);
            $picFileName = $fileUploader->upload($pic);
            $pic = $picFileName;
        }

        $vote = Vote::create([
            'voters_id' => $voter_id,
            'candidates' => $candidates,
            'date_created' => $date_created
        ]);

        if (!$vote) {
            header('location: /' . URL_SUBFOLDER . '/vote');
        }
        // Update voter's status
        $voter = new Voter();
        $result = $voter->update($voter_id, $pic);
        if (!$result) {
            return;
        }
        header('location: /' . URL_SUBFOLDER . '/results');
    }

    public function results(RouteCollection $routes)
    {
        $this->session = new Session();
        $loggedIn = $this->session->get('loggedIn', null);
        if (is_null($loggedIn)) {
            header('location: /' . URL_SUBFOLDER);
        } else {
            $pres_votes = Vote::getPresidentialVotes();
            $vicePress_votes = Vote::getVicePresVote();
            $genSec_votes = Vote::getGenSecVote();
            $asstGenSec_vote = Vote::getAssGenSecVote();
            $treasurer_vote = Vote::getTreasurerVote();
            $finSec_vote = Vote::getFinSecVote();
            $auditor_vote = Vote::getAuditorVote();
            $sosSec_vote = Vote::getSocSecVote();
            $medPubSec_vote = Vote::getMedPubSecVote();
            $voter = new Voter();
            $voters = $voter->getAll();
            require_once APP_ROOT . '/views/results.php';
        }
    }
}
