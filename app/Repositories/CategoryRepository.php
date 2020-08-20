<?php

namespace App\Repositories;

use App\Category;
class CategoryRepository
{
    public static function all()
    {
        return Category::all();
    }

    public static function getByCategory($category)
    {
        return Category::findOrFail($category);
    }
}