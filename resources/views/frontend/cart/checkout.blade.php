@extends('frontend.layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-8 col-lg-offset-2 text-center">
        <h1>Checkout</h1>
        <hr class="short panel-primary">
        <p class="fs-115 mb-30"><i class="fa fa-lock mr-5"></i>You are completely safe with our secure 128 bit TLS 1.2 encrypted payment solution.</p>
    </div>
    <div class="row mb-50">
        <div class="col-md-12">
            <div class="col-md-4">
                <!--REVIEW ORDER-->
                <div class="panel panel-minimal">
                    <div class="panel-heading text-center bg-primary">
                        <h4>Order Summary</h4>
                    </div>
                    <div class="panel-body">
                        <p>Subtotal<span class="pull-right">Rs. {{ $payment->subtotal }}</span></p>
                        <p>Tax<span class="pull-right">-</span></p>
                        <p>Convenience Fee<span class="pull-right">Rs. {{ $payment->convenience }}</span></p>
                        <hr class="mt-0 mb-0">
                        <p class="fs-115 mb-0 mt-10">
                            <strong>Total<span class="pull-right">Rs. {{ $payment->total }}</span></strong>
                        </p>
                    </div>
                    <div class="panel-footer text-center">
                        <h4 class="mb-15">Payment Method</h4>
                        <div class="paymentWrap mb-10">
                            <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                <label class="btn paymentMethod active">
                                    <div class="method visa"></div>
                                    <input type="radio" name="options" checked> 
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method master-card"></div>
                                    <input type="radio" name="options"> 
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method amex"></div>
                                    <input type="radio" name="options">
                                </label>
                                <label class="btn paymentMethod">
                                    <div class="method ez-cash"></div>
                                    <input type="radio" name="options"> 
                                </label>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-minimal">
                    <div class="panel-heading">
                        <h4>Payment Details</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('frontend.payment')}}" method="POST" accept-charset="utf-8">
                            {{csrf_field()}}
                            <input type="hidden" name="token" value="{{ $payment->token }}">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="name">Card Holder Name</label>
                                        <input type="text" class="form-control" name="name" required autofocus/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card_number">Card Number</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" name="card_number" placeholder="Card Number" required maxlength="16" />
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="card_expiry"><span class="hidden-xs">Expiration</span><span class="visible-xs-inline">Exp</span> Date</label>
                                        <div class="form-group form-inline">
                                            <input type="tel" name="exp_month" class="form-control" placeholder="MM" required maxlength="2"> 
                                            <input type="tel" name="exp_year" class="form-control" placeholder="YY" required maxlength="2"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cvv">CV Code</label>
                                        <input type="tel" class="form-control" name="cvv" placeholder="CVC" required maxlength="4"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Complete Payment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection