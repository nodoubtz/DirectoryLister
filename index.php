<?php

use App\Bootstrap\AppManager;
use App\Controllers;
use DI\Container;
use Dotenv\Dotenv;

require __DIR__ . '/app/vendor/autoload.php';

// Set file access restrictions
ini_set('open_basedir', __DIR__);

// Initialize environment variable handler
Dotenv::createImmutable(__DIR__)->safeLoad();

// Initialize the container
$container = new Container();
$container->set('base_path', __DIR__);

// Configure the application
$app = $container->call(AppManager::class);

// Register routes
$app->get('/[{path:.*}]', Controllers\IndexController::class);

// Engage!
$app->run();
