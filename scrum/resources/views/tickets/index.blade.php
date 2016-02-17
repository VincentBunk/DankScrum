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

					<a href="/ticket/new/{{ $project->id }}">Create Ticket</a>

				</div>
			</div>

			<!-- Current Tickets -->
			@if (count($tickets) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Tickets
					</div>

					<div class="panel-body">
						<table class="table table-striped ticket-table">
							<thead>
								<th>Ticket</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($tickets as $ticket)
									<tr>
										<td class="table-text"><div>{{ $ticket->title }}</div></td>

										<!-- Ticket Delete Button -->
										<td>
											<form action="/ticket/{{ $ticket->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-ticket-{{ $ticket->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
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
