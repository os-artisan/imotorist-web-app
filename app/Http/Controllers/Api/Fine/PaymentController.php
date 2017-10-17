<?php

namespace App\Http\Controllers\Api\Fine;

use App\Models\Fine\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class PaymentController extends Controller
{
    /**
     * Make payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $ticket_id = $request->input('ticket_id');

        $ticket = Ticket::where('id', '=', $ticket_id)->first();

        // will handle the top part later

        $request = Request::create('http://DummyPaymentGateway.somee.com/Payment/visa', 'POST', array(
             'ReturnURL'     => 'https://www.google.lk/',
             'PayAmount'    => '450',
        ));

        Route::dispatch($request);
    }
}
