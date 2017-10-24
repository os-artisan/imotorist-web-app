@extends('frontend.layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12 text-center">
        <h1>My Cart</h1>
        <hr class="short panel-primary">
    </div>
    <div class="col-lg-9">
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
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="pull-right fs-115"><strong>Subtotal: Rs. 2000.00</strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <button type="button" class="btn btn-primary btn-lg btn-block mb-22">Checkout</button>
    </div>
</div>

@endsection