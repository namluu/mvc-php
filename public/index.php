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

echo get_class($router);
