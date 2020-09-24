<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

  $image = "Post_Image_" . rand(1, 5);

  return [
    'user_id' => User::all()->random()->id,
    'title' => $title = $faker->sentence(rand(8, 12)),
    'slug' => Str::slug($title, '-'),
    'body' => $body = $faker->paragraphs(rand(10, 15), true),
    'excerpt' => Str::limit($body, 250),
    'image' => rand(0, 1) == 1 ? $image : NULL,
  ];
});
