@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Project
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Project Form -->
					<form action="/project" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Project Name -->
						<div class="form-group">
							<label for="project-title" class="col-sm-3 control-label">Project</label>

							<div class="col-sm-6">
								<input type="text" name="title" id="project-name" class="form-control" value="{{ old('project') }}">
							</div>
						</div>

						<!-- Add Project Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Project
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Projects -->
			@if (count($projects) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Projects
					</div>

					<div class="panel-body">
						<table class="table table-striped project-table">
							<thead>
								<th>Project</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($projects as $project)
									<tr>
										<td class="table-text"><div><a href="/tickets/{{ $project->id }}">{{ $project->title }}</a></div></td>

										<!-- Project Delete Button -->
										<td>
											<form action="/project/{{ $project->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-project-{{ $project->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>
										<td>
											<form action="/project/edit/{{ $project->id }}" method="GET">
                                                {{ csrf_field() }}
												<button type="submit" id="edit-project-{{ $project->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-edit"></i>Edit
												</button>
											</form>
										</td>
                                        <td>
                                            <a href="/scrum/{{ $project->id }}"
                                            <button type="submit" id="edit-project-{{ $project->id }}" class="btn btn-primary">
                                                <i class="fa fa-btn fa-edit"></i>SCRUM
                                            </button>
                                        </td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
