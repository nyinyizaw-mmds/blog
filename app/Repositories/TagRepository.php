<?php

namespace App\Repositories;

use App\Tag;
class TagRepository
{
    public static function all()
    {
        return Tag::all();
    }

    public static function getByTag($tag)
    {
        return Tag::findOrFail($tag);
    }
}