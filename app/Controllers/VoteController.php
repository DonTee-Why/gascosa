<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Models\Voter;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Session\Session;

class VoteController
{
    private $session;

    public function index(RouteCollection $routes)
    {
        $this->session = new Session();
        $loggedIn = $this->session->get('loggedIn', null);
        if (is_null($loggedIn)) {
            header('location: /gascosa/login');
        }else{
            require_once APP_ROOT . '/views/vote.php';
        }
    }

    // Sign in the voter
    public function voteAction(RouteCollection $routes)
    {
    }
}
