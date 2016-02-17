<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	use App\Http\Requests;
	use App\Http\Controllers\Controller;

	use App\Project;
    use DB;
	use App\Repositories\ProjectRepository;

	class AdminController extends Controller
	{
		/**
		 * The project repository instance.
		 *
		 * @var ProjectRepository
		 */
		protected $projects;

        /**
         * The status repository instance.
         *
         * @var StatusRepository
         */
        protected $status;

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
		 * Display a list of all projects.
		 *
		 * @return Response
		 */
		public function index()
		{
			$projects = Project::all();
			return view('admin.index', [
				'projects' => $projects
			]);
		}

        public function view()
        {
            $status_array = DB::table('status')->get();
            $severity_array = DB::table('severities')->get();
            $type_array = DB::table('ticket_types')->get();
            //$severity_array = DB::table('severity')->get();
            $attributes = NULL;
            return view('admin.view', [
                'statuses' => $status_array,
                'severities' => $severity_array,
                'ticket_types' => $type_array
            ]);
        }

        /**
         * @param Request $request
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function addOption(Request $request)
        {
            $this->validate($request, [
                'status' => 'max:255',
                'severity' => 'max:255',
                'ticket_type' => 'max:255',
            ]);

            if ($request->has('status')) {
                DB::table('status')->insert([
                    'title' => $request->status
                ]);
            }

            if ($request->has('severity')) {
                DB::table('severities')->insert([
                    'title' => $request->severity
                ]);
            }

            if ($request->has('ticket_type')) {
                DB::table('ticket_types')->insert([
                    'title' => $request->ticket_type
                ]);
            }

            $status_array = DB::table('status')->get();
            $severity_array = DB::table('severities')->get();
            $type_array = DB::table('ticket_types')->get();

            return view('admin.view', [
                'statuses' => $status_array,
                'severities' => $severity_array,
                'ticket_types' => $type_array
            ]);
        }


	}
