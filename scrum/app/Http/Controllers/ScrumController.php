<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Ticket;
use App\Status;
use App\Severity;
use App\TicketType;
use DB;
use App\Repositories\ProjectRepository;
use App\Repositories\TicketRepository;

class ScrumController extends Controller
{
	/**
	 * The ticket repository instance.
	 *
	 * @var TicketRepository
	 */
	protected $tickets;

    /**
     * The project repository instance.
     *
     * @var ProjectRepository
     */
    protected $projects;

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
	 * @param  Project  $project
	 * @return Response
	 */
	public function index(Project $project)
	{
        $tickets = $this->tickets->byProject($project);
		return view('scrum.index', [
			'tickets' => $tickets,
            'project' => $project
		]);
	}

    /**
     * Changes the status of a ticket
     *
     * @param Request $request
     * @param Ticket $ticket
     */
    public function changeStatus(Request $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        $ticket->status = $request->status;
        $ticket->save();
    }
}
