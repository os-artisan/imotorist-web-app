@extends('frontend.layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12 text-center">
        <h1>Your Cart</h1>
        <hr class="short panel-primary">
    </div>
    <div class="row mb-50">
        <div class="col-md-12">
            <div class="col-md-3 col-md-push-9">
                <!--REVIEW ORDER-->
                <div class="panel panel-minimal">
                    <div class="panel-heading text-center">
                        <h4>Review Order</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 mb-10">
                            <strong>Subtotal</strong>
                            <div class="pull-right"><span>Rs. </span><span>1,500.00</span></div>
                        </div>
                        <div class="col-md-12 mb-10">
                            <small>Tax</small>
                            <div class="pull-right"><span>-</span></div>
                        </div>
                        <div class="col-md-12">
                            <small>Convenience Fee</small>
                            <div class="pull-right"><span>Rs. </span><span>25.00</span></div>
                            <hr>
                        </div>
                        <div class="col-md-12 mb-10 fs-115">
                            <strong>Total</strong>
                            <div class="pull-right"><strong><span>Rs. </span><span>1,525.00</span></strong></div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-lg btn-block mb-22">Checkout</button>
                <!--REVIEW ORDER END-->
            </div>
            <div class="col-md-9 col-md-pull-3">
                <!--SHIPPING METHOD-->
                <div class="panel panel-minimal panel-primary">
                    <div class="panel-heading"><strong>Your Cart: </strong>2 item</div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="pl-15"><strong>Ticket #</strong></td>
                                    <td class="text-right"><strong>Fine Amount (Rs.)</strong></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td class="pl-15">645876</td>
                                    <td class="text-right">1,000.00</td>
                                    <td class="text-right pr-15"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td class="pl-15">687534</td>
                                    <td class="text-right">500.00</td>
                                    <td class="text-right pr-15"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection