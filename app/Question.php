<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
	protected $guarded = [];

	/**
	 * Every 'question' can have many 'answers'
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function answers(  ) {
		return $this->hasMany( Answer::class );
	}
}
