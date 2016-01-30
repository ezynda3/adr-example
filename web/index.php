<?php
use Stark\App\Providers\AppProvider;
use josegonzalez\Dotenv\Loader as Dotenv;
use Radar\Adr\Boot;
use Relay\Middleware\ExceptionHandler;
use Relay\Middleware\ResponseSender;
use Zend\Diactoros\Response as Response;
use Zend\Diactoros\ServerRequestFactory as ServerRequestFactory;

/**
 * Bootstrapping
 */
require '../vendor/autoload.php';

Dotenv::load([
    'filepath' => dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env',
    'toEnv' => true,
]);

$boot = new Boot();
$adr = $boot->adr([
    AppProvider::class
], true);

/**
 * Middleware
 */
$adr->middle(new ResponseSender());
$adr->middle(new ExceptionHandler(new Response()));
$adr->middle('Radar\Adr\Handler\RoutingHandler');
$adr->middle('Radar\Adr\Handler\ActionHandler');

/**
 * Routes
 */
$adr->get('Users\GetUsers', '/users', 'Stark\Domain\Services\Users\GetUsers');
$adr->get('Users\GetUser', '/users/{id}', 'Stark\Domain\Services\Users\GetUser');
$adr->get('Users\GetUserShifts', '/users/{id}/shifts', 'Stark\Domain\Services\Users\GetUserShifts');
$adr->get('Users\getUserHours', '/users/{id}/hours', 'Stark\Domain\Services\Users\GetUserHours');

/**
 * Run
 */
$adr->run(ServerRequestFactory::fromGlobals(), new Response());
