<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title'];

	/**
	 * Get the user who created the project.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
