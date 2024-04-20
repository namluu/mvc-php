<?php
declare(strict_types=1);

namespace App\Controllers;

use \Core\View;
use \App\Models\PostModel;

class PostController extends \Core\Controller
{
    public function indexAction()
    {
        $posts = PostModel::getAll();

        View::render('Post/index.php', [
            'posts' => $posts
        ]);
    }

    public function viewAction($id)
    {
        $post = PostModel::getOne($id);

        if (!$post) {
            throw new \Exception('No Post found.', 404);
        }

        View::render('Post/view.php', [
            'post' => $post
        ]);
    }

    public function createAction()
    {
        echo 'hello from the create action in Posts controller';
    }
}