<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
	//
	protected $guarded = [];

	/**
	 * Every answer can have only one question
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function question() {
		return $this->belongsToMany( Question::class );
	}
}
