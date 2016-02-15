<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	use App\Http\Requests;
	use App\Http\Controllers\Controller;

	use App\Project;
    use App\Ticket;
	use App\Repositories\ProjectRepository;
    use App\Repositories\TicketRepository;

	class ProjectController extends Controller
	{
		/**
		 * The project repository instance.
		 *
		 * @var ProjectRepository
		 */
		protected $projects;

        /**
         * The ticket repository instance.
         *
         * @var TicketRepository
         */
        protected $tickets;

		/**
		 * Create a new controller instance.
		 *
		 * @param  ProjectRepository  $projects
		 * @return void
		 */
		public function __construct(ProjectRepository $projects)
		{
			$this->middleware('auth');

			$this->projects = $projects;
		}

		/**
		 * Display a list of all of the user's tickets.
		 *
		 * @param  Request  $request
		 * @return Response
		 */
		public function index(Request $request)
		{
			$projects = Project::all();
			return view('projects.index', [
				//'projects' => $this->projects->forUser($request->user()),
				'projects' => $projects
			]);
		}

        /**
         * Display a project.
         *
         * @param  Request  $request
         * @return Response
         */
        public function view(Request $request)
        {
            return view('projects.index', [
                'tickets' => $this->tickets->byProject($request->project()),
            ]);
        }

		/**
		 * Create a new project.
		 *
		 * @param  Request  $request
		 * @return Response
		 */
		public function create(Request $request)
		{
			$this->validate($request, [
				'title' => 'required|max:255',
			]);

			$request->user()->projects()->create([
				'title' => $request->title,
			]);

			return redirect('/projects');
		}

		/**
		 * Update the given project.
		 *
		 * @param  Project  $project
		 * @return Response
		 */
		public function edit(Project $project)
		{
			$this->authorize('edit', $project);

			return view('projects.edit', [
				'project' => $project
			]);
		}

		/**
		 * Update the given project.
		 *
		 * @param  Request  $request
		 * @param  Project  $project
		 * @return Response
		 */
		public function update(Request $request, Project $project)
		{
			$this->authorize('update', $project);

			$project->title = $request->title;

			$project->save();

			return redirect('/projects');
		}

		/**
		 * Delete the given ticket.
		 *
		 * @param  Request  $request
		 * @param  Project  $project
		 * @return Response
		 */
		public function delete(Request $request, Project $project)
		{
			$this->authorize('delete', $project);

            $project->delete();

			return redirect('/projects');
		}
	}
