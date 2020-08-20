<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'title' => $faker->sentence(2),
        'content' => $faker->text(),
        'category_id'=> factory('App\Category')->create()->id,
        'published' => $faker->boolean(90)
    ];
});
