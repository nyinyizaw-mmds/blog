<?php

namespace App\Repositories;

use App\Post;
class PostRepository
{
    public function all()
    {
        return Post::with(['category','tags'])->paginate(10);
    }

    public function getByPost($post)
    {
        return Post::findOrFail($post->id);
    }
}