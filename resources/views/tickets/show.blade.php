@extends('layouts.app')

@section('content')
    <h6>Title</h6>
    <p>{{ $ticket->title}}</p>

    <h6>Description</h6>
    <p>{{ $ticket->description}}</p>

    <h6>Status</h6>
    <p>{{ $ticket->status->status}}</p>

    <hr>
    <a class="btn btn-warning btn-sm" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
    {!! Form::open(['action' => ['TicketsController@destroy', $ticket->id], 'method' => 'delete']) !!}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
    {!! Form::close() !!}
@endsection