<?php
declare(strict_types=1);
class Router
{
    /**
     * Associative array of routes (the routing table)
     */
    protected $routes = [];

    /**
     * Associative array of parameters in a route
     */
    protected $params = [];

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

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found
     * 
     * @param string $url The route URL
     * 
     * @return boolean true if a match found, false otherwise
     */
    public function match($url): bool
    {
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Get the currently matched parameters
     * 
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}
