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

        $response = json_decode($pay->completePayment($request), true);

        $success = isset($response['success']) ? $response['success'] : '';
        $error = isset($response['error']) ? $response['error'] : '';

        if ($success) {
            return redirect()->route('frontend.user.dashboard')->withFlashSuccess($success);
        }
        elseif ($error) {
            return redirect()->back()->withErrors($error);
        }
    }
}
