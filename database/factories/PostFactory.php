<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

  $category = Category::inRandomOrder()->first();

  $image = $category->slug .  '.jpg';

  $date = Carbon::create(2020, 9, 14, 9);

  return [
    'author_id' => User::all()->random()->id,
    'title' => $title = $faker->sentence(rand(8, 12)),
    'slug' => Str::slug($title, '-'),
    'body' => $body = $faker->paragraphs(rand(10, 15), true),
    'excerpt' => Str::limit($body, 250),
    'image' => (rand(0, 1) == 1) ? $image : NULL,
    'published_at' => (rand(0, 10) < 3) ? NULL : $date->addDays(rand(1, 20)),
    'category_id' => $category->id,
    'view_count' => rand(1, 10) * 10,
  ];
});
