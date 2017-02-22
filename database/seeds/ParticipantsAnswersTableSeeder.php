<?php

use Illuminate\Database\Seeder;

class ParticipantsAnswersTableSeeder extends Seeder {

	/**
	 * @throws Exception
	 */
	public function run() {
		//
		$userIds = DB::table( 'users' )->take( 20 )->pluck( 'id' )->toArray();
		$answerIds = DB::table( 'answers' )->take( 20 )->pluck( 'id' )->toArray();
		try {
			foreach ( $userIds as $key => $value ) {
				DB::table( 'participant_answer' )->insert(
						[
								'answer_id' => $answerIds[array_rand( $answerIds )],
								'participant_id' => $userIds[array_rand( $userIds )],
								'created_at' => \Carbon\Carbon::now()->toDateTimeString()
						]
				);
			}
		} catch(Exception $e) {
				echo  $e->getMessage();
		}
	}
}