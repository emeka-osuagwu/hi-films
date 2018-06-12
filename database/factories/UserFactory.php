<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Genre::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Models\FilmGenre::class, function (Faker $faker) {
    return [
        'film_id' => rand(1, 3),
        'genre_id' => rand(1, 50)
    ];
});

$factory->define(App\Models\Film::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'realease_date' => Carbon::now(),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'video_url' => "https://www.youtube.com/watch?v=fLeJJPxua3E",
        'rating' => rand(1, 5),
        'ticket_price' => rand(1, 5) . rand(1, 100) . rand(1, 100) . rand(1, 1300),
        'country' => $faker->country,
        'genre' => $faker->name,
        'slug' => $faker->name
    ];
});
