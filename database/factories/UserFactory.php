<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(App\ProfessionalCategory::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->name,
    ];
});

$factory->define(User::class, function (Faker $faker) {
    return [
        'cat_id' => 1,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'study_field' => $faker->name,
        'cgpa' => rand(2.00,4.00),
        'graduation_year' => rand(1990,2019),
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'), // password
        'remember_token' => Str::random(10),
    ];
});

// $factory->define(App\Category::class, function (Faker $faker) {
//     return [
//         'cat_name' => $faker->name,
//     ];
// });

// $factory->define(App\Post::class, function (Faker $faker) {
//     return [
//         'cat_id' => rand(1,10),
//         'user_id' => rand(1,10),
//         'title' => $faker->sentence,
//         'description' => $faker->paragraph,
//         'photo' => $faker->imageUrl,
//     ];
// });
