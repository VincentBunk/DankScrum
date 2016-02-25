@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $ticket->title }}
				</div>

                <table class="table table-striped ticket-table">
                    <thead>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Progress</th>
                        <th>Estimated Time</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Severity</th>
                        <th>Type</th>
                        <th>Assigned to</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="table-text"><div>{{ $ticket->title }}</div></td>
                        <td class="table-text"><div>{{ $ticket->description }}</div></td>
                        <td class="table-text"><div>{{ $ticket->progress }}</div></td>
                        <td class="table-text"><div>{{ $ticket->est_time }}</div></td>
                        <td class="table-text"><div>{{ $ticket->priority }}</div></td>
                        <td class="table-text"><div>{{ $ticket->status->title }}</div></td>
                        <td class="table-text"><div>{{ $ticket->severity->title }}</div></td>
                        <td class="table-text"><div>{{ $ticket->ticket_type->title }}</div></td>
	                    <td class="table-text"><div>{{ $ticket->assignee->name }}</div></td>

                    </tr>
                    </tbody>
                </table>

				@can('update', $ticket)
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
                                <input type="text" name="title" id="ticket-title" class="form-control" value="{{ $ticket->title }}">
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

                                <label for="ticket-priority" class="col-sm-3 control-label">Priority</label>
                                <input id="ticket-priority" name="priority" value="{{ $ticket->priority }}">

                                <label for="ticket-est_time" class="col-sm-3 control-label">Estimated time</label>
                                <input id="ticket-est_time" name="est_time" value="{{ $ticket->est_time }}">

                                <label for="ticket-progress" class="col-sm-3 control-label">Progress</label>
                                <input id="ticket-progress" name="progress" value="{{ $ticket->progress }}">

                                <label for="ticket-description" class="col-sm-3 control-label">Description</label>

                                <textarea name="description" cols="50" rows="10">Your description</textarea>

	                            <label for="ticket-assignee" class="col-sm-3 control-label">Assigned to:</label>

	                            <select name="assignee_id" id="ticket-assignee">
		                            @foreach ($users as $user)
		                            <option value="{{ $user->id }}">{{ $user->name }}</option>
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
			@endcan
		</div>
	</div>
@endsection
