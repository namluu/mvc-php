<?php
/*
echo 'hello MVC ';
echo '<br>';
echo 'query string: ' . $_SERVER['QUERY_STRING'];
echo '<br>';
echo 'request uri: ' . $_SERVER['REQUEST_URI'];
echo '<br>';
$uri = trim($_SERVER['REQUEST_URI'], '/');
echo 'request uri: ' . $uri;
*/
require '../Core/Router.php';

$router = new Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

// Display the routing table
echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';
