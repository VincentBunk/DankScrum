@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">

			<!-- Current Projects -->
			@if (count($project) > 0)
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

									<tr>
										<td class="table-text"><div>Title: {{ $project->title }}</div></td>

										<!-- Project Delete Button -->
										<td>
											<form action="/project/update/{{ $project->id }}" method="POST">
												{{ csrf_field() }}
                                                <div class="col-sm-6">
													<input type="text" name="title" id="update-project-{{ $project->id }}" class="form-control" value="{{ old('project') }}">
												</div>
												<button type="submit" class="btn btn-default">
													<i class="fa fa-btn"></i>Save
												</button>
											</form>
										</td>
									</tr>

							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
