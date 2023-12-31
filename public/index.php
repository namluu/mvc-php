<?php

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\','/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\' , '/', $class) . '.php';
    }
});

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('post', ['controller' => 'Post', 'action' => 'index']);
$router->add('post/new', ['controller' => 'Post', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$adminCustomLink = 'backend8090';
$router->add($adminCustomLink . '/{controller}/{action}', ['namespace' => 'Admin']);
$router->add($adminCustomLink . '/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);

// Start router
$uri = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($uri);
