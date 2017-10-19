<div class="col-lg-9">
    <div class="panel panel-minimal panel-default print-visible">
        <div class="panel-heading">
            <div class="pl-15 pr-15">
                <h2>Spot Fine Ticket<span class="pull-right">Rs. {{ $ticket->total_amount }}</span></h2>
                <h4>{{ $ticket->id }}<span class="pull-right">{!! $ticket->getPaidLabelAttribute() !!}</span></h4>
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
                    <div class="alert alert-info mt-10" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Details of the offender are hidden for privacy concerns. If this is your ticket, please log in to your account to see the full ticket.</div>
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <label>Date and Time of Offence:</label>
                        <p>{{ $ticket->created_at->toDayDateTimeString() }}</p>
                    </div>
                    <div class="col-sm-6">
                        <label>Place:</label>
                        <p>{{ $ticket->location }} (<a href="#">6.825513, 79.958611</a>)</p>
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

<div class="col-lg-3 print-hidden">
    <form action="{{route('api.make-payment')}}" method="POST" accept-charset="utf-8">
        {{csrf_field()}}
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
        <button class="btn btn-primary btn-block mb-22" type="submit">Pay Now!</button>
    </form>
    <div class="panel panel-minimal">
        <div class="list-group">
            <a href="#" class="list-group-item">
                <i class="fa fa-cart-plus mr-10" aria-hidden="true"></i>Add to Cart
            </a>
            <a href="" class="list-group-item" onclick="window.print()">
                <i class="fa fa-print mr-10" aria-hidden="true"></i>Print Ticket
            </a>
        </div>
    </div><!-- panel -->
</div>