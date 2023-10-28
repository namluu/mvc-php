<?php
declare(strict_types=1);
class Router
{
    /**
     * Associative array of routes (the routing table)
     */
    protected $routes = [];

    /**
     * Add a route to the routing table
     * 
     * @param string $route The route URL
     * @param array $params Parameters (controller, action, etc.)
     * @return void
     */
    public function add(string $route, array $params): void
    {
        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     * 
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
