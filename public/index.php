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

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$adminCustomLink = 'backend8090';
$router->add($adminCustomLink . '/{controller}/{action}', ['namespace' => 'Admin']);
$router->add($adminCustomLink . '/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);

// Start router
$uri = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($uri);
