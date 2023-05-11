<?php
session_start();
use Services\Router;

// Autoloader function
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});

require_once __DIR__ . '/Services/functions.php';

// Router should handle request
$router = new Router();
$router->loadConfig();
$router->handle();