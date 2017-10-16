@extends('frontend.layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 text-center mb-40">
            <h2>Let's Find Your Ticket!</h2>
            <hr class="short panel-primary">
            <div class="input-group col-lg-8 col-lg-offset-2">
                <input type="text" class="input-lg form-control" placeholder="Enter Your Ticket Number" />
                <span class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="button">
                    <span class=" glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>

        <div id="results">
            <!-- Search Results -->
            <div class="col-md-9 col-md-push-3">
                <div class="panel panel-minimal panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><strong>Search results for: </strong>645876</div>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="pl-15"><strong>Ticket #</strong></td>
                                    <td><strong>Date</strong></td>
                                    <td class="text-right"><strong>Fine Amount (Rs.)</strong></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <tr>
                                    <td class="pl-15">645876</td>
                                    <td>Oct 10, 2017</td>
                                    <td class="text-right">1,000.00</td>
                                    <td class="text-right pr-15"><span class="label label-danger fs-100">Unpaid</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Filters -->
            <div class="col-md-3 col-md-pull-9">
                <div class="panel panel-minimal">
                    <div class="side-menu pb-0">
                        <ul class="nav">
                            <li>
                                <a href="JavaScript:Void(0);" data-toggle="collapse" data-target="#payment">
                                    <i class="fa fa-credit-card mr-10" aria-hidden="true"></i>
                                    <span>Payment Status</span>
                                    <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </a>
                                <div class="collapse nav in pl-15 pr-15" id="payment">
                                    <div class="checkbox checkbox-danger mb-15">
                                        <input id="unpaid" type="checkbox" class="mr-10" checked>
                                        <label for="unpaid">
                                            Unpaid
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-primary">
                                        <input id="paid" type="checkbox" class="styled" unchecked>
                                        <label for="paid">
                                            Paid
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="JavaScript:Void(0);" data-toggle="collapse" data-target="#penalty">
                                    <i class="fa fa-money mr-10" aria-hidden="true"></i>
                                    <span>Penalty</span>
                                    <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </a>
                                <div class="collapse nav" id="penalty">
                                    <div class="input-group col-xs-12 mb-15 mt-10">
                                        <div class="col-xs-6 input-group-sm">
                                            <span>From:</span>
                                            <input type="text" class="form-control" placeholder="20"/>
                                        </div>
                                        <div class="col-xs-6 input-group-sm">
                                            <span>To:</span>
                                            <input type="text" class="form-control" placeholder="25000"/>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="JavaScript:Void(0);" data-toggle="collapse" data-target="#date">
                                    <i class="fa fa-calendar-check-o mr-10" aria-hidden="true"></i>
                                    <span>Date</span>
                                    <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </a>
                                <div class="collapse nav" id="date">
                                    <div class="col-xs-12 mb-15 mt-15">
                                        <div class="col-xs-12 input-group input-group-sm">
                                            <span class="input-group-addon"><i class="fa fa-calendar mr-0" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="01/15/2017 - 02/15/2017"/>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <section class="bg-primary download">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 text-center mb-60 mt-35">
                <h2>Find out how you're doing as a Driver!</h2>
                <hr class="short">
                <p class="fs-115 mb-22">It is completely free and will remain free forever!</p>
                {{ link_to_route('frontend.auth.register', 'Signup today!', [], ['class' => 'btn btn-default btn-lg' ]) }}
            </div>
        </div>
    </section>

@endsection