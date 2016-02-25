<?php

namespace App;

use App\User;
use App\Status;
use App\Severitiy;
use App\TicketType;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'project_id', 'status_id', 'severity_id', 'ticket_type_id', 'description', 'assignee_id'];

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
		//return $this->hasMany('App\Status', 'id');
        return $this->belongsTo(Status::class);
	}

	/**
	 * Get the severity record associated with the ticket.
	 */
	public function severity()
	{
		//return $this->hasMany('App\Severity', 'id');
        return $this->belongsTo(Severity::class);
	}

	/**
	 * Get the ticket_type record associated with the ticket.
	 */
	public function ticket_type()
	{
		//return $this->hasMany('App\TicketType', 'id');
        return $this->belongsTo(TicketType::class);
	}

	/**
	 * Get the user record assigned to the ticket.
	 */
	public function assignee()
	{
		//return $this->hasMany('App\TicketType', 'id');
		return $this->belongsTo(User::class);
	}


}
