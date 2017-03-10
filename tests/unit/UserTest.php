<?php

use App\User;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
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
		$CreatedUsers = factory(User::class, 50)->create();

		$foundUser = User::find(1);

		$this->assertEquals($CreatedUsers->take(1)->get()->id, $foundUser->id);
		$this->assertEquals($CreatedUsers->take(1)->get()->name, $foundUser->name);
	}
}