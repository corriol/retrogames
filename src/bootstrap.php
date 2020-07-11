<?php

use App\Core\App;
use App\Core\Response;
use App\Core\Router;
use App\DBConnection;
use App\Model\UserModel;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Plasticbrain\FlashMessages\FlashMessages;

session_start();
require __DIR__ . '/../vendor/autoload.php';

$router = new Router();
require __DIR__ . '/../config/routes.php';

App::set('router', $router);

$response = new Response();
App::set('response', $response);

$config = require __DIR__ . '/../config/config.php';
App::set('config', $config);


$flashMessage = new FlashMessages();
App::set('flash', $flashMessage);

App::set('connection', DBConnection::getConnection());


// create a log channel
$log = new Logger('myLogger');
$log->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG));

App::set('logger', $log);


if (!empty($_SESSION["loggedUser"])) {
    App::set('user', App::getModel(UserModel::class)->find($_SESSION["loggedUser"]));
} else
    App::set('user', null);

