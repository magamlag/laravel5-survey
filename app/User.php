<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * Each 'user' has many 'questions'
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function questions() {
		return $this->hasMany( Question::class );
	}

	/**
	 * Many 'users' has many 'answers'
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function answers() {
		return $this->belongsToMany( Question::class );
	}
}
