@extends('frontend.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="col-lg-9">
            <div class="panel panel-minimal panel-default print-section">
                <div class="panel-heading">
                    <div class="pl-15 pr-15">
                        <h2>Spot Fine Ticket</h2>
                        <h4>8642595<span class="label label-danger pull-right">Unpaid</span></h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Full Name of the Driver:</label>
                                <p>Pathagama Kuruppuge Tharindu</p>
                            </div>
                            <div class="col-sm-6">
                                <label>Address of the Driver:</label>
                                <p>150/4/2, Pallanwattha, Pannipitiya.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-6">
                                <label>Vehicle No:</label>
                                <p>WP XF-2040</p>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <label>D/L No:</label>
                                <p>B876356</p>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <label>NIC No:</label>
                                <p>912921549v</p>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <label>Competent to Drive:</label>
                                <p>A, A1, B, G1</p>
                            </div>
                        </div>
                        <hr class="mt-10">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Date and Time of Offence:</label>
                                <p>Dec 11, 2016 2:15 PM</p>
                            </div>
                            <div class="col-sm-6">
                                <label>Place:</label>
                                <p>Giriulla Junction (<a href="#">6.825513, 79.958611</a>)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Police Station:</label>
                                <p>Giriulla</p>
                            </div>
                            <div class="col-sm-6">
                                <label>Issuing Officer:</label>
                                <p>Kosthapel Punyasoma (54600)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-xs-6">
                                <label>Valid From:</label>
                                <p>Dec 11, 2016</p>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <label>Valid To:</label>
                                <p>Dec 24, 2016</p>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <label>Court:</label>
                                <p>Kuliyapitiya</p>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <label>Court Date:</label>
                                <p>Jan 03, 2017</p>
                            </div>
                        </div>
                        <div class="row mb-15">
                            <div class="col-sm-12">
                                <label>Remarks:</label>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dicta dolorem, veritatis numquam omnis tenetur aperiam libero nobis doloribus, culpa at ad mollitia temporibus deserunt praesentium adipisci architecto fugiat odio!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading text-center">
                                <strong>Offence Summery</strong>
                            </div>
                            <div class="panel-body">
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <td><strong>Offence</strong></td>
                                            <td class="text-right"><strong>Fine (Rs.)</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td>Speeding</td>
                                            <td class="text-right">1000.00</td>
                                        </tr>
                                        <tr>
                                            <td>Improper Overtaking</td>
                                            <td class="text-right">500.00</td>
                                        </tr>
                                        <tr>
                                            <td>Fail to keep to left when turning left</td>
                                            <td class="text-right">500.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>Subtotal</strong></td>
                                            <td class="text-right">2000.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--panel body-->
            </div><!-- panel -->
        </div>
        <div class="col-lg-3">
            <a href="" class="btn btn-success btn-block mb-22">Pay Now!</a>
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <i class="fa fa-cart-plus mr-10" aria-hidden="true"></i>Add to Cart
                </a>
                <a href="" class="list-group-item" onclick="window.print()">
                    <i class="fa fa-print mr-10" aria-hidden="true"></i>Print Ticket
                </a>
            </div>
        </div>
    </div><!-- /.container -->
</section>

@endsection