<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Models\Fine\Ticket;
use App\Models\Fine\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valid and unpaid tickets.
        $this->validate($request, [
            'ticket_no'      => 'required|array|exists:tickets,ticket_no,paid,0',
        ]);

        // Get Ticket(s)
        $tickets = Ticket::whereIn('ticket_no', $request->ticket_no)->get();

        $subtotal = 0;
        $convenience = 0;

        foreach ($tickets as $ticket) {
            $subtotal += $ticket->total_amount;
            $convenience += config('fine.convenience_fee');
        }

        $total = $subtotal + $convenience;

        $input = [
            'user_id'       => Auth::user()->id,
            'token'         => unique_random(config('fine.payments_table'), 'token', config('fine.payment_token.length')),
            'subtotal'      => $subtotal,
            'convenience'   => $convenience,
            'total'         => $total,
        ];

        $payment = Payment::create($input);

        Ticket::whereIn('ticket_no', $request->ticket_no)->update(['payment_id' => $payment->id]);

        return redirect()->route('frontend.checkout.show', $payment->token);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        $payment = Payment::where('token', '=', $token)->firstOrFail();

        return view('frontend.cart.checkout')->withPayment($payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
