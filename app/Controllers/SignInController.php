<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Models\Voter;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Session\Session;

class SignInController
{
    private $session;

    // Show the voting page if user is logged in
    public function index(RouteCollection $routes)
    {
        $this->session = new Session();
        $loggedIn = $this->session->get('loggedIn', null);
        if (!is_null($loggedIn)) {
            header('location: /gascosa/vote');
        }
        
        require_once APP_ROOT . '/views/index.php';
    }

    // Carry out the voting action
    public function signIn(RouteCollection $routes)
    {
        $request = Request::createFromGlobals();
        $email = $request->get('email');

        $voter  = new Voter();
        $voter->find($email);

        if ($voter->find($email)) {
            $this->session = new Session();
            $this->session->set('loggedIn', $email);
            header('location: /gascosa/vote');
        }
    }
}
