<?php

namespace App\Http\Controllers\Api\Fine;

use App\Models\Fine\Ticket;
use App\Models\Fine\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * complete payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        // Valid and unpaid tickets.
        $this->validate($request, [
            'ticket_no'      => 'required|array|exists:tickets,ticket_no,paid,0',
        ], [
            'ticket_no.exists' => 'This ticket is not found or has already been paid.',
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

        return response()->json(['token' => $payment->token]);
    }

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

        return $this->markAsPaid($json);
    }

    public function markAsPaid($response)
    {
        $is_success = $response['is_success'];
        $token = $response['token'];
        $transaction_id = $response['transaction_id'];
        $error = $response['error'];

        $return = [];

        if (! $is_success && ! is_null($error)) {
            $return = ['error' => $error];
        } elseif ($is_success) {
            $payment = Payment::where('token', '=', $token)->first();

            $payment->status = true;
            $payment->transaction_id = $transaction_id;
            $payment->save();

            Ticket::where('payment_id', '=', $payment->id)->update(['paid' => true]);

            $return = ['success' => 'Your payment was successful. Thank you for using iMotorist!'];
        } else {
            $return = ['error' => 'There was an error processing your order. Please contact us or try again later.'];
        }

        return response()->json($return);
    }
}
