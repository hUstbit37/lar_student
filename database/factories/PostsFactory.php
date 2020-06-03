<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>'Khu man '.Str::random(3),
        'post_content'=>'Cai khu man tòng teng '.Str::random(5),

    ];
});