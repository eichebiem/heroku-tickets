@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'TicketsController@store', 'method' => 'post']) !!}
        {!! Form::token() !!}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status_id', $statuses, null, ['placeholder' => 'Pick a status...', 'class' => 'form-control']) }}
        </div>

        {{ Form::submit('Submit', ['class' => 'btn btn-primary float-right']) }}
        <a href="{{ route('tickets.index') }}">Back</a>
    {!! Form::close() !!}
    
    
@endsection