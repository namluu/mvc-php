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

// Display the routing table
echo '<pre>';
var_dump($router->getRoutes());
$uri = trim($_SERVER['REQUEST_URI'], '/');
if ($router->match($uri)) {
    var_dump($router->getParams());
} else {
    echo 'no route found for URL: ' . $uri;
}
$router->dispatch($uri);
echo '</pre>';
