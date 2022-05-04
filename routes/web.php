<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


// Routes system
$routes = new RouteCollection();

$install = new Route(URL_SUBFOLDER . '/install', ['controller' => 'DBController', 'method' => 'index']);

$index = new Route(URL_SUBFOLDER . '/', ['controller' => 'SignInController', 'method' => 'index']);
$login = new Route(URL_SUBFOLDER . '/login', ['controller' => 'SignInController', 'method' => 'index']);
$signIn = new Route(URL_SUBFOLDER . '/signIn', ['controller' => 'SignInController', 'method' => 'signIn'], [], [], '', [], ['POST']);
$logout = new Route(URL_SUBFOLDER . '/logout', ['controller' => 'SignInController', 'method' => 'logout']);

$vote = new Route(URL_SUBFOLDER . '/vote', ['controller' => 'VoteController', 'method' => 'index']);
$voteAction = new Route(URL_SUBFOLDER . '/voteAction', ['controller' => 'VoteController', 'method' => 'voteAction'], [], [], '', [], ['POST']);
$results = new Route(URL_SUBFOLDER . '/results', ['controller' => 'VoteController', 'method' => 'results']);

$routes->add('index', $index);
$routes->add('login', $login);
$routes->add('signIn', $signIn);
$routes->add('logout', $logout);
$routes->add('vote', $vote);
$routes->add('voteAction', $voteAction);
$routes->add('results', $results);
