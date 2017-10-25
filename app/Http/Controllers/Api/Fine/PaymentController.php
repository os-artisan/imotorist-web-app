<?php

namespace App\Http\Controllers\Api\Fine;

use App\Http\Controllers\Controller;
use App\Models\Fine\Payment;
use App\Models\Fine\Ticket;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * complete payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function completePayment(Request $request)
    {
        // Valid and unpaid tickets.
        $this->validate($request, [
            'token'         => 'required|exists:payments,token',
            'name'          => 'required',
            'card_number'   => 'numeric',
            'exp_month'     => 'numeric',
            'exp_year'      => 'numeric',
            'cvv'           => 'numeric',
        ]);

        $total = Payment::where('token', $request->token)->first()->total;

        $client = new \GuzzleHttp\Client();

        $url = 'http://www.dummypaymentgateway.somee.com/payment';

        $params = [
                'token'         => $request->token,
                'card_type'     => 'VISA',
                'card_no'       => $request->card_number,
                'cvv'           => $request->cvv,
                'card_name'     => $request->name,
                'exp_year'      => $request->exp_year,
                'exp_month'     => $request->exp_month,
                'amount'        => $total,
        ];

        $header = [
            'Accept' => 'application/json'
        ];

        $response = $client->request('POST', $url, [
            'headers' => $header,
            'form_params' => $params,
        ]);

        $json = json_decode($response->getBody(), true);

        return $json;
    }
}
