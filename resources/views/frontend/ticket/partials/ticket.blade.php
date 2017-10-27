<div class="col-lg-9">
    <div class="panel panel-minimal panel-default print-visible">
        <div class="panel-heading">
            <div class="pl-15 pr-15">
                <div class="row mt-22">
                    <div class="col-sm-6 col-xs-12"><h2 class="mt-0">Spot Fine Ticket</h2></div>
                    <div class="col-sm-6 col-xs-12"><h2 class="pull-right mt-0">Rs. {{ $ticket->total_amount }}</h2></div>
                </div>
                <div class="row">
                    <div class="col-xs-6"><h4 class="mt-0">{{ $ticket->ticket_no }}</h4></div>
                    <div class="col-xs-6"><h4 class="pull-right mt-0">{!! $ticket->getPaidLabelAttribute() !!}</h4></div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-lg-12">

                @if($logged_in_user == $ticket->motorist->user)
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Full Name of the Driver:</label>
                            <p>{{ $ticket->motorist->user->name }}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Address of the Driver:</label>
                            <p>{{ $ticket->motorist->user->address }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <label>Vehicle No:</label>
                            <p>{{ $ticket->vehicle_no }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <label>D/L No:</label>
                            <p>{{ $ticket->motorist->license_no }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <label>NIC No:</label>
                            <p>{{ $ticket->motorist->user->nic }}</p>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <label>Competent to Drive:</label>
                            <p>
                            @foreach($ticket->motorist->vehicleClasses as $class)
                                {{ $class->class }},
                            @endforeach
                            </p>
                        </div>
                    </div>
                    <hr class="mt-10">
                @else
                    <div class="alert alert-info mt-10" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Details of the offender are hidden for privacy concerns. 
                        @if(!$logged_in_user)
                        If this is your ticket, please log in to your account to see the full ticket.
                        @endif
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <label>Date and Time of Offence:</label>
                        <p>{{ $ticket->created_at->toDayDateTimeString() }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label>Place:</label>
                        <p>{{ $ticket->location }} (<a href="#" data-toggle="modal" data-target="#googleMap">{{ $ticket->lat }}, {{ $ticket->lng }}</a>)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Police Station:</label>
                        <p>{{ $ticket->station->name }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label>Issuing Officer:</label>
                        <p>{{ $ticket->officer->user->name }} ({{ $ticket->officer->badge_no }})</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <label>Valid From:</label>
                        <p>{{ $ticket->created_at->toFormattedDateString() }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <label>Valid To:</label>
                        <p>{{ $ticket->created_at->addDays(14)->toFormattedDateString() }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <label>Court:</label>
                        <p>{{ $ticket->station->court->name }}</p>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <label>Court Date:</label>
                        <p>{{ $ticket->created_at->addDays(24)->toFormattedDateString() }}</p>
                    </div>
                </div>
                <div class="row mb-15">
                    @if(!is_null($ticket->remarks))
                    <div class="col-sm-12">
                        <label>Remarks:</label>
                        <p>{{ $ticket->remarks }}</p>
                    </div>
                    @endif
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

                                @foreach($ticket->offences as $offence)
                                <tr>
                                    <td>{{ $offence->description }}</td>
                                    <td class="text-right">{{ $offence->fine }}</td>
                                </tr>
                                @endforeach

                                <tr class="fs-115">
                                    <td class="text-right"><strong>Subtotal</strong></td>
                                    <td class="text-right">{{ $ticket->total_amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--panel body-->
    </div><!-- panel -->
</div>

<div class="modal fade" id="googleMap" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 print-hidden">
    <form action="{{route('frontend.checkout.store')}}" method="POST" accept-charset="utf-8">
        {{csrf_field()}}
        <input type="hidden" name="ticket_no[]" value="{{ $ticket->ticket_no }}">
        <button class="btn btn-primary btn-block mb-22" {{ ($ticket->paid) ? 'disabled' : '' }} type="submit">Pay Now!</button>
    </form>
    <div class="panel panel-minimal">
        <div class="list-group">
            <form action="{{route('frontend.cart.store')}}" method="POST" accept-charset="utf-8">
                {{csrf_field()}}
                <input type="hidden" name="ticket_no[]" value="{{ $ticket->ticket_no }}">
                <button type="submit" class="list-group-item {{ ($ticket->inCart() || $ticket->isPaid()) ? 'disabled' : ''}}">
                    <i class="fa fa-cart-plus mr-10" aria-hidden="true"></i>Add to Cart
                </button>
            </form>
            <a href="" class="list-group-item" onclick="window.print()">
                <i class="fa fa-print mr-10" aria-hidden="true"></i>Print Ticket
            </a>
        </div>
    </div><!-- panel -->
</div>