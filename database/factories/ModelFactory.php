<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Groups::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->word
    ];
});

$factory->define(App\Models\Task::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->word
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->safeEmail
    ];
});

$factory->define(App\Models\UserGroups::class, function (Faker\Generator $faker) {
    $user_ids = App\Models\User::pluck('id');
    $thread_ids = App\Models\Groups::pluck('id');

    return [
        'user_id' => $user_ids->random(),
        'group_id' => $thread_ids->random(),
    ];
});
