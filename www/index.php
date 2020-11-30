<?php
require_once 'Autoloader.php';

// Register namespaces
$autoloader = new Autoloader();
$autoloader->addNamespace('Site', __DIR__ . '/src');
$autoloader->register();

// Add Routes

require_once "router.php";
$v = new \Site\Viewer();
$userController = new \Site\User(new \Site\Viewer(), new Site\Model\User());

// Routes
route('/', function () use ($userController) {
    $userController->listAction();
});

route('/get', function () use ($userController) {
    $userController->getAction();
});

route('/post', function () use ($userController) {
   $userController->postAction();
});

route('/404', function () use ($userController) {
   $userController->notFoundAction();
});

$action = $_SERVER['REQUEST_URI'];
dispatch($action);