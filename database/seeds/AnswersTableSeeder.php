<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
			factory(App\Answer::class, 50)->create(['question_id'=>App\Question::all()->random(3)->last()->id])
					->each(function($a) {
						$a->participants()->save(factory(App\User::class)->make());
			});
		}
}
