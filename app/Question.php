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

	/**
	 * Every 'question' can belongs to one 'user'
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author(  ) {
		return $this->belongsTo( User::class );
	}
}
