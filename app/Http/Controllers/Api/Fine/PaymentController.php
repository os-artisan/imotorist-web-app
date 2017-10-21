<?php

namespace App\Http\Controllers\Api\Fine;

use App\Models\Fine\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

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

        $url = 'http://DummyPaymentGateway.somee.com/Payment/visa';

        //Redirect::away('http://DummyPaymentGateway.somee.com/Payment/visa')->withInputs(Input::all());

        return Redirect::to($url, ['PayAmount'=>'500', 'ReturnURL'=>'http://DummyPaymentGateway.somee.com/Payment/index']);
    }
}
