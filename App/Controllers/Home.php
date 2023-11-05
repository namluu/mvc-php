<?php
declare(strict_types=1);

namespace App\Controllers;

class Home
{
    public function index()
    {
        echo 'hello from the index action in Home controller';
    }

    public function create()
    {
        echo 'hello from the create action in Posts controller';
    }
}