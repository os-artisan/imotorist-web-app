<?php

namespace App\Http\Controllers\Backend\Fine;

use App\Models\Fine\Ticket;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Fine\Ticket\ManageTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageTicketRequest $request)
    {
        return view('backend.fine.ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Ticket $ticket
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket, ManageTicketRequest $request)
    {
        return view('backend.fine.ticket.show')
            ->withTicket($ticket);
    }
}
