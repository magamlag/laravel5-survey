<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
	//
	protected $guarded = [];

	/**
	 * Every 'answer' can have only one 'question'
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function questions() {
		return $this->belongsToMany( Question::class );
	}

	/**
	 * Every 'answer' can have many 'participants'
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function participants() {
		return $this->belongsToMany( User::class, 'participant_answer', 'answer_id', 'participant_id' );
	}
}
