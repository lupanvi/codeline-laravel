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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Film::class, function (Faker\Generator $faker) {
    
	$name = $faker->name;

    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->paragraph,
        'release_date' => $faker->date,
        'rating' => rand(1,5),
        'ticket_price' => 50,
        'country' => $faker->sentence,        
        'photo' => $faker->imageUrl(400,300)      

    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    

    return [
        'name' => $faker->name,
        'comment' => $faker->paragraph,
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'film_id' => function(){
            return factory('App\Film')->create()->id;
        }
    ];


});

$factory->define(App\Genre::class, function (Faker\Generator $faker) {    

    return [
        'name' => $faker->word                
    ];


});


$factory->define(App\FilmGenre::class, function (Faker\Generator $faker) {
    

    return [
        'film_id' => function(){
            return factory('App\Film')->create()->id;
        },
        'genre_id' => function(){
            return factory('App\Genre')->create()->id;
        }
    ];

    
});


