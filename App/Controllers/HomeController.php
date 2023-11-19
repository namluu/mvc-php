<?php
declare(strict_types=1);

namespace App\Controllers;

use \Core\View;

class HomeController extends \Core\Controller
{
    public function indexAction()
    {
        View::render('Home/index.php', [
            'name' => 'Nam'
        ]);
    }

    public function createAction()
    {
        echo 'hello from the create action in Posts controller';
        echo '<p>query string '. htmlspecialchars(print_r($this->routeParams, true)) .' </p>';
    }
}