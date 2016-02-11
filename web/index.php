<?php
use Stark\App\Providers\AppProvider;
use josegonzalez\Dotenv\Loader as Dotenv;
use Radar\Adr\Boot;
use Relay\Middleware\ExceptionHandler;
use Relay\Middleware\ResponseSender;
use Zend\Diactoros\Response as Response;
use Zend\Diactoros\ServerRequestFactory as ServerRequestFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Bootstrapping
 */
require '../vendor/autoload.php';

Dotenv::load([
    'filepath' => dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env',
    'toEnv' => true,
]);

// Boot Eloquent
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'sqlite',
    'database'  => __DIR__ . '/../database.sqlite',
]);

$capsule->bootEloquent();

// Boot Radar
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

// Users
$adr->get('Users\GetUsers', '/users', 'Stark\Domain\Services\Users\GetUsers');
$adr->get('Users\GetUser', '/users/{id}', 'Stark\Domain\Services\Users\GetUser');
$adr->get('Users\GetUserShifts', '/users/{id}/shifts', 'Stark\Domain\Services\Users\GetUserShifts');
$adr->get('Users\GetUserHours', '/users/{id}/hours', 'Stark\Domain\Services\Users\GetUserHours');

// Shifts
$adr->get('Shifts\GetShifts', '/shifts', 'Stark\Domain\Services\Shifts\GetShifts');
$adr->get('Shifts\GetShiftUsers', '/shifts/{id}/users', 'Stark\Domain\Services\Shifts\GetShiftUsers');
$adr->post('Shifts\CreateShift', '/shifts', 'Stark\Domain\Services\Shifts\CreateShift');
$adr->put('Shifts\UpdateShift', '/shifts/{id}', 'Stark\Domain\Services\Shifts\UpdateShift');

/**
 * Run
 */
$adr->run(ServerRequestFactory::fromGlobals(), new Response());
