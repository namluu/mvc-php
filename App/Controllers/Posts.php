<?php
declare(strict_types=1);

namespace App\Controllers;

use \Core\View;

class Posts
{
    public function index()
    {
        View::render('Post/index.php');
    }

    public function create()
    {
        echo 'hello from the create action in Posts controller';
    }
}