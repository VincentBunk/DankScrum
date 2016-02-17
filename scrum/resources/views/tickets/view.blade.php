@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Ticket
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Ticket Form -->
					<form action="/ticket" method="POST" class="form-horizontal">
						{{ csrf_field() }}

                        <input type="hidden" name="project_id" id="ticket-project_id" class="form-control" value="{{ $project->id }}">
						<!-- Ticket Name -->
						<div class="form-group">
							<label for="ticket-title" class="col-sm-3 control-label">Ticket Title</label>

							<div class="col-sm-6">
								<input type="text" name="title" id="ticket-title" class="form-control" value="{{ old('ticket') }}">
							</div>
						</div>

						<!-- Add Ticket Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Ticket
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
