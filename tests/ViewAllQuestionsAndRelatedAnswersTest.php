<?php

use App\Question;
use App\Answer;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewAllQuestionsAndRelatedAnswersTest extends TestCase
{
	//Automatically migrate all tables
	use DatabaseMigrations;
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testViewAllQuestionsAndRelatedAnswers()
	{
		$users = factory(User::class, 50)->create();
		$questions = factory(Question::class, 50)->create();
		$answers = factory(Answer::class)->create();

		$this->visit('/home')
				->see('Laravel');
	}
}
