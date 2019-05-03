<?php
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Franchise;
use App\FranchiseWorkingDay;
use App\ArenaType;
use App\Arena;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => Hash::make('password'),
        'api_token' => Hash::make('api_token'),
        'status' => 1
    ];
});

$factory->define(App\Franchise::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return User::all()->random();
        },
        'name' => $faker->name,
        'tag_line' => $faker->sentence(6, 2),
        'address' => $faker->address,
        'lat' => $faker->latitude(90, -90),
        'lon' => $faker->longitude(-180, 180),
        'phone' => $faker->phoneNumber,
        'additional_phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'logo' => $faker->imageUrl(640, 480, 'cats'),
        'status' => $faker->boolean(100),
        'inactive_reason' => "",
        'allow_on_site' => $faker->boolean(100),
        'monday' => $faker->boolean(100),
        'tuesday' => $faker->boolean(100),
        'wednesday' => $faker->boolean(100),
        'thursday' => $faker->boolean(100),
        'friday' => $faker->boolean(100),
        'saturday' => $faker->boolean(100),
        'sunday' => $faker->boolean(100),
    ];
});

$factory->define(App\ArenaType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Arena::class, function (Faker\Generator $faker) {
    return [
        'franchise_id' => function () {
            return Franchise::all()->random();
        },
        'arena_type_id' => function () {
            return ArenaType::all()->random();
        },
        'description' => $faker->text,
        'status' => $faker->boolean(100),
        'inactive_reason' => '',
    ];
});

// $factory->define(App\Arena::class, function (Faker\Generator $faker) {
//     return [
//         'name' => $faker->name,
//         'tag_line' => $faker->sentence(6,2),
//         'address' => $faker->text,
//         'lat' => 0.0000,
//         'lon' => 0.0000,
//         'phone' => $faker->phoneNumber,
//         'email' => $faker->email,
//         'status' => 1,
//         'allow_on_site' => 1
//     ];
// });
