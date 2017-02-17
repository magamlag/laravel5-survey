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
	$questions = App\Question::take(40)->pluck('id')->toArray();
	return [
			'text' => $faker->name,
			'question_id' => $faker->randomElement($questions),
			'right_answer' => $faker->randomElement( [ '0', '1' ] ),
			'count' => 0,
	];
});
