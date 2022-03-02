<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


// Routes system
$routes = new RouteCollection();

$index = new Route(URL_SUBFOLODER . '/', ['controller' => 'SignInController', 'method'=>'index']);
$login = new Route(URL_SUBFOLODER . '/login', ['controller' => 'SignInController', 'method'=>'index']);
$signIn = new Route(URL_SUBFOLODER . '/signIn', ['controller' => 'SignInController', 'method'=>'signIn'], [], [], '', [], ['POST']);
$logout = new Route(URL_SUBFOLODER . '/logout', ['controller' => 'SignInController', 'method'=>'logout']);

$vote = new Route(URL_SUBFOLODER . '/vote', ['controller' => 'VoteController', 'method'=>'index']);
$voteAction = new Route(URL_SUBFOLODER . '/voteAction', ['controller' => 'VoteController', 'method'=>'voteAction'], [], [], '', [], ['POST']);

$routes->add('index', $index);
$routes->add('login', $login);
$routes->add('signIn', $signIn);
$routes->add('logout', $logout);
$routes->add('vote', $vote);
$routes->add('voteAction', $voteAction);