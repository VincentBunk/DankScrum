<?php

namespace App\Policies;

use App\User;
use App\Ticket;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

	/**
	 * Determine if the given user can delete the given task.
	 *
	 * @param  User  $user
	 * @param  Ticket  $ticket
	 * @return bool
	 */
	public function delete(User $user, Ticket $ticket)
	{
		return $user->id === $ticket->user_id || $user->role_id == 1 ;
	}

	/**
	 * Determine if the given user can update the given task.
	 *
	 * @param  User  $user
	 * @param  Ticket  $ticket
	 * @return bool
	 */
	public function update(User $user, Ticket $ticket)
	{
		return $user->id === $ticket->user_id || $user->role == 1;
	}
}
