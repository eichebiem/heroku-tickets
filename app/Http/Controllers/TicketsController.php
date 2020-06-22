<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Status;
use App\Http\Requests\TicketRequest;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Tickets";
        $tickets = Ticket::latest()->get();
        return view('tickets.index', compact('tickets', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create ticket";
        $statuses = Status::all()->pluck('status', 'id');

        return view('tickets.create', compact('title', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        Ticket::create($request->all());

        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $title = "Ticket #" . $ticket->id;
        return view('tickets.show', compact('ticket', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $title = "Edit Ticket #" . $ticket->id;
        $statuses = Status::all()->pluck('status', 'id');

        return view('tickets.edit', compact('ticket', 'title', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        $title = "Ticket #" . $ticket->id;
        $ticket = Ticket::findOrFail($ticket->id);
        $ticket->update($request->all());

        return redirect()->route('tickets.show', $ticket->id)->with('title', $title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket = Ticket::findOrFail($ticket->id);
        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}
