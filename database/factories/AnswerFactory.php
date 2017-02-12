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
$factory->define(App\Answer::class, function (Faker\Generator $faker) {

	return [
			'text' => $faker->name,
			'question_id' => factory(App\Question::class)->create()->id,
			'right_answer' => $faker->randomElements( [ 0, 1 ] ),
	];
});
