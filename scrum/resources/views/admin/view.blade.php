@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Ticket Attributes
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')



					<!-- New Ticket Form -->
					<form action="/admin/attributes/" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Ticket Status -->
						<div class="form-group">
							<label for="status" class="col-sm-3 control-label">Status</label>

                            <select name="status">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->title }}</option>
                            @endforeach
                            </select>

							<div class="col-sm-6">
								<input type="text" name="status" id="status-title" class="form-control" value="">
							</div>
						</div>

                        <!-- Ticket Severity -->
                        <div class="form-group">
                            <label for="severity" class="col-sm-3 control-label">Severity</label>

                            <select name="severity">
                                @foreach ($severities as $severity)
                                <option value="{{ $severity->id }}">{{ $severity->title }}</option>
                                @endforeach
                            </select>

                            <div class="col-sm-6">
                                <input type="text" name="severity" id="severity-title" class="form-control" value="">
                            </div>
                        </div>

                        <!-- Ticket Types -->
                        <div class="form-group">
                            <label for="type" class="col-sm-3 control-label">Type</label>

                            <select name="ticket_type">
                                @foreach ($ticket_types as $ticket_type)
                                <option value="{{ $ticket_type->id }}">{{ $ticket_type->title }}</option>
                                @endforeach
                            </select>

                            <div class="col-sm-6">
                                <input type="text" name="ticket_type" id="type-title" class="form-control" value="">
                            </div>
                        </div>

						<!-- Add Ticket Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Options
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
