<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'project_id', 'status_id'];

	/**
	 * Get the user who created the ticket.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the user who is assigned to the ticket.
	 */
	public function assigned()
	{
		return $this->belongsTo(User::class);
	}
}
