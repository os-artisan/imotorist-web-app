<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Models\Fine\Ticket;
use App\Models\Fine\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $checkout = new \App\Http\Controllers\Api\Fine\PaymentController();

        // Valid and unpaid tickets.
        $this->validate($request, [
            'ticket_no'      => 'required|array|exists:tickets,ticket_no,paid,0',
        ], [
            'ticket_no.exists' => 'This ticket has already been paid.',
        ]);

        $response = json_decode($checkout->checkout($request)->content());

        $token = $response->token;

        if ($token) {
            return redirect()->route('frontend.checkout.show', $token);
        }

        return $response;
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
