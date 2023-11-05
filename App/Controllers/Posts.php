<?php
declare(strict_types=1);
class Posts
{
    public function index()
    {
        echo 'hello from the index action in Posts controller';
    }

    public function create()
    {
        echo 'hello from the create action in Posts controller';
    }
}