<?php

namespace App\Http\Controllers\Frontend\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * complete payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postToGateway(Request $request)
    {
        $pay = new \App\Http\Controllers\Api\Fine\PaymentController();
        $response = $pay->completePayment($request);

        $is_success = $response['is_success'];
        $token = $response['token'];
        $transaction_id = $response['transaction_id'];
        $error = $response['error'];

        if (! $is_success) {
            return redirect()->back()->withErrors($error);
        }

        return redirect()->route('frontend.user.dashboard')->withFlashSuccess('Your payment was successful. Thank you for using iMotorist!');
    }
}
