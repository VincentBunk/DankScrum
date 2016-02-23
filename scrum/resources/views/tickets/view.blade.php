@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $ticket->title }}
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')
                    <!-- New Ticket Form -->
                    <form action="/ticket/update/{{$ticket->id}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Ticket Name -->
                        <div class="form-group">
                            <label for="ticket-title" class="col-sm-3 control-label">New Ticket Title</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="ticket-title" class="form-control" value="">
                            </div>


                            <div class="col-sm-6">
                                <label for="ticket-status" class="col-sm-3 control-label">Status</label>

                                <select name="status_id" id="ticket-status">
                                    @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->title }}</option>
                                    @endforeach
                                </select>
                                <label for="ticket-severity" class="col-sm-3 control-label">Severity</label>

                                <select name="severity_id" id="ticket-severity">
                                    @foreach ($severities as $severity)
                                    <option value="{{ $severity->id }}">{{ $severity->title }}</option>
                                    @endforeach
                                </select>

                                <label for="ticket-type" class="col-sm-3 control-label">Type</label>

                                <select name="ticket_type_id" id="ticket-type">
                                    @foreach ($ticket_types as $ticket_type)
                                    <option value="{{ $ticket_type->id }}">{{ $ticket_type->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Add Ticket Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Update Ticket
                                </button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
@endsection
