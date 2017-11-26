<?php

use Faker\Generator as Faker;

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

/*factory for table users*/
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeThisMonth
    ];
});

/*Factory for table Film*/

$factory->define(App\Film::class, function (Faker $faker){
   return [
       'name' => $faker->name,
       'description'    => $faker->realText(rand(80, 200)),
       'release_date'   => $faker->date,
       'rating'         => rand(1,5),
       'ticket_price'   => rand(20,25),
       'country'        => $faker->century,
       'genre'          => ucfirst($faker->words(rand(5,10), true)),
       'photo'          => $faker->imageUrl(336, 188, null, true),
       'user_id'        => function () {
           return App\User::inRandomOrder()->first()->id;
       },
       'created_at' => $faker->dateTimeThisMonth
   ];
});


$factory->define(App\Comment::class, function (Faker $faker){
    return [
        'comment'   => $faker->realText(rand(10, 200)),
        'film_id' => function () {
            return App\Film::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'created_at' => $faker->dateTimeThisMonth
    ];
});


