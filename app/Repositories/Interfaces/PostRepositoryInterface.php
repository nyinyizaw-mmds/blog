<?php

namespace App\Repositories\Interfaces;
use App\Post;

interface PostRepositoryInterface
{
    public function all();

    public function getByPost(Post $post);
}