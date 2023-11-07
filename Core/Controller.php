<?php
declare(strict_types=1);

namespace Core;

abstract class Controller
{
    protected $routeParams = [];

    public function __construct(array $routeParams)
    {
        $this->routeParams = $routeParams;
    }
}