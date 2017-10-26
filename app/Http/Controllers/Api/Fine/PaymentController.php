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
        // Get only valid and unpaid orders.
        $this->validate($request, [
            'token'         => 'required|exists:payments,token,status,0',
            'name'          => 'required',
            'card_number'   => 'numeric|digits:16',
            'exp_month'     => 'numeric|digits_between:1,2',
            'exp_year'      => 'numeric|digits_between:1,2',
            'cvv'           => 'numeric|digits_between:3,4',
        ], [
            'token.exists' => 'There was an error processing your order. Please contact us or try again later.',
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
            'Accept' => 'application/json',
        ];

        $response = $client->request('POST', $url, [
            'headers' => $header,
            'form_params' => $params,
        ]);

        $json = json_decode($response->getBody(), true);

        //return $json;

        return $this->markAsPaid($json);
    }

    public function markAsPaid($response)
    {
        $is_success = $response['is_success'];
        $token = $response['token'];
        $transaction_id = $response['transaction_id'];
        $error = $response['error'];

        $return = [];

        if (!$is_success && !is_null($error)) {
            $return = ['error' => $error];
        }
        elseif ($is_success) {

            $payment = Payment::where('token', '=', $token)->first();

            $payment->status = true;
            $payment->transaction_id = $transaction_id;
            $payment->save();

            Ticket::where('payment_id', '=', $payment->id)->update(['paid' => true]);

            $return = ['success' => 'Your payment was successful. Thank you for using iMotorist!'];
        }
        else {
            $return = ['error' => 'There was an error processing your order. Please contact us or try again later.'];
        }

        return json_encode($return);
    }
}
