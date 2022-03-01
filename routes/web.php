<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


// Routes system
$routes = new RouteCollection();

$index = new Route(URL_SUBFOLODER . '/', ['controller' => 'SignInController', 'method'=>'index']);
$login = new Route(URL_SUBFOLODER . '/login', ['controller' => 'SignInController', 'method'=>'login']);
$signIn = new Route(URL_SUBFOLODER . '/signIn', ['controller' => 'SignInController', 'method'=>'signIn'], [], [], '', [], ['POST']);

$vote = new Route(URL_SUBFOLODER . '/vote', ['controller' => 'VoteController', 'method'=>'index']);
$voteAction = new Route(URL_SUBFOLODER . '/voteAction', ['controller' => 'VoteController', 'method'=>'vote'], [], [], '', [], ['POST']);

$routes->add('index', $index);
$routes->add('login', $login);
$routes->add('signIn', $signIn);
$routes->add('vote', $vote);
$routes->add('voteAction', $voteAction);