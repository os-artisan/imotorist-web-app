<?php

namespace App\Http\Controllers\Frontend\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * complete payment.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postToGateway(Request $request)
    {
        $pay = new \App\Http\Controllers\Api\Fine\PaymentController();

        $response = json_decode($pay->completePayment($request)->content());

        if (isset($response->success)) {
            return redirect()->route('frontend.user.dashboard')->withFlashSuccess($response->success);
        } elseif (isset($response->error)) {
            return redirect()->back()->withErrors($response->error);
        }
    }
}
