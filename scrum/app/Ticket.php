<?php

namespace App;

use App\User;
use App\Status;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'project_id', 'status_id', 'severity_id', 'ticket_type_id'];

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

	/**
	 * Get the status record associated with the ticket.
	 */
	public function status()
	{
		return $this->hasOne('App\Status', 'id');
	}

	/**
	 * Get the severity record associated with the ticket.
	 */
	public function severity()
	{
		return $this->hasOne('App\Severity', 'id');
	}

	/**
	 * Get the ticket_type record associated with the ticket.
	 */
	public function ticket_type()
	{
		return $this->hasOne('App\TicketType', 'id');
	}


}
