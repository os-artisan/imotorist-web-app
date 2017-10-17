<?php

namespace App\Http\Controllers\Frontend\Ticket;

use App\Models\Fine\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('frontend.ticket.show')->withTicket($ticket);
    }

    /**
     * Search the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
        $this->validate($request, [
            'ticket_number' => 'required|numeric',
        ]);

        $keyword = $request->input('ticket_number');

        $ticket = Ticket::where('id','=', $keyword)->first();

        if($ticket) {
            $ticket->load('motorist','officer', 'station', 'offences');
            return view('frontend.ticket.index', compact('ticket', 'keyword'));     
        }

        return redirect('/ticket')->withFlashDanger('Sorry, we didn\'t find any records matching that ticket number.');
    }
}
