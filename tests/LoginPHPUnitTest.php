<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginPHPUnitTest extends TestCase
{
    /**
     * Test if login page accessible
     *
     * @return void
     */
    public function testLoginURL()
    {
			$response = $this->call( 'GET', '/login' );
			$this->assertEquals( 200, $response->status() );
    }

	/**
	 * Submitting form with empty fields
	 *
	 * @return void
	 */
	public function testBlankFields() {
		$this->visit( '/login' )
			->press( 'Login' )
			->seePageIs( '/login' );
	}

	/**
	 * Submitting form with incorrect values
	 *
	 * @return void
	 */
	public function testMisMatchedData(  ) {
		$this->visit( '/login' )
				->type( 'faild', 'email' )
				->type( 'lsfjlsfj', 'password' )
				->press( 'Login' )
				->seePageIs( '/login' );
	}

	/**
	 * Submitting form with correct data
	 *
	 * @return void
	 */
	public function testCorrectData(  ) {
		$this->visit( '/login' )
				->type( 'test@gustr.com', 'email' )
				->type( 'qqqqqqq', 'password' )
				->press( 'Login' )
				->seePageIs( '/result' );
	}
}
