<?php
declare(strict_types=1);

namespace App\Controllers;

use \Core\View;
use \App\Models\PostModel;

class PostController
{
    public function indexAction()
    {
        $posts = PostModel::getAll();

        View::render('Post/index.php', [
            'posts' => $posts   
        ]);
    }

    public function createAction()
    {
        echo 'hello from the create action in Posts controller';
    }
}