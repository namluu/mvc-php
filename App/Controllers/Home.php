<?php
declare(strict_types=1);

namespace App\Controllers;

class Home
{
    public function index()
    {
        echo 'hello from the index action in Home controller';
        echo '<p>query string '. htmlspecialchars(print_r($_GET, true)) .' </p>';
    }

    public function create()
    {
        echo 'hello from the create action in Posts controller';
    }
}