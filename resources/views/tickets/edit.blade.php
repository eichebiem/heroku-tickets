@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => ['TicketsController@update', $ticket->id], 'method' => 'put']) !!}
        {!! Form::token() !!}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $ticket->title, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', $ticket->description, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status_id', $statuses, $ticket->status->id, ['placeholder' => 'Pick a status...', 'class' => 'form-control']) }}
        </div>

        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection