@extends('layouts.app')

@section('content')
    <a class="btn btn-primary btn-sm" href="{{ route('tickets.create') }}" role="button">Add new ticket</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td><a href="{{ route('tickets.show', $ticket->id)}}">{{ $ticket->title }}</a></td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->status->status }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('tickets.edit', $ticket->id) }}">Edit</a>
                            {!! Form::open(['action' => ['TicketsController@destroy', $ticket->id], 'method' => 'delete']) !!}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection
