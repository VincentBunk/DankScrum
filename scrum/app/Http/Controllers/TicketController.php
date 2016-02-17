<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Ticket;
use DB;
use App\Repositories\ProjectRepository;
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
		return view('tickets.index', [
			'tickets' => $tickets,
            'project' => $project
		]);
	}

    /**
     * Displays a ticket
     *
     * @param Ticket $ticket
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Ticket $ticket)
    {
        return view('tickets.view', [
            'ticket' => $ticket
        ]);
    }

    /**
     * Displays ticket create page
     *
     * @param int $project_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newAction($project_id)
    {
        $status_array = DB::table('status')->get();
        // TODO: pass attributes of select fields to view
        return view('tickets.new', [
            'project_id' => $project_id,
            'statuses' => $status_array
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
            'project_id' => 'required',
		]);

		$request->user()->tickets()->create([
			'title' => $request->title,
            'project_id' => $request->project_id,
            'status_id' => $request->status_id
		]);

		return redirect('/tickets/'.$request->project_id);
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
