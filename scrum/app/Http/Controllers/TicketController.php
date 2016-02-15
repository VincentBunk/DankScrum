<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ticket;
use App\Repositories\TicketRepository;

class TicketController extends Controller
{
	/**
	 * The ticket repository instance.
	 *
	 * @var TicketRepository
	 */
	protected $tickets;

	/**
	 * Create a new controller instance.
	 *
	 * @param  TicketRepository  $tickets
	 * @return void
	 */
	public function __construct(TicketRepository $tickets)
	{
		$this->middleware('auth');

		$this->tickets = $tickets;
	}

	/**
	 * Display a list of all of the user's tickets.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		return view('tickets.index', [
			'tickets' => $this->tickets->forUser($request->user()),
		]);
	}

	/**
	 * Create a new ticket.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function create(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
		]);

		$request->user()->tickets()->create([
			'title' => $request->title,
		]);

		return redirect('/tickets');
	}

	/**
	 * Update the given ticket.
	 *
	 * @param  Request  $request
	 * @param  Ticket  $ticket
	 * @return Response
	 */
	public function update(Request $request, Ticket $ticket)
	{
		$this->authorize('update', $ticket);

		$ticket->title = "new title";

		$ticket->save();

		return redirect('/ticket{ticket}');
	}

	/**
	 * Delete the given ticket.
	 *
	 * @param  Request  $request
	 * @param  Ticket  $ticket
	 * @return Response
	 */
	public function delete(Request $request, Ticket $ticket)
	{
		$this->authorize('delete', $ticket);

		$ticket->delete();

		return redirect('/tickets');
	}
}
