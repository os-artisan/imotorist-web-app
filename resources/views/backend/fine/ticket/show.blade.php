@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.fine.tickets.management') . ' | ' . trans('labels.backend.fine.tickets.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.fine.tickets.management') }}
        <small>{{ trans('labels.backend.fine.tickets.view') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.fine.tickets.view') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.fine.includes.partials.ticket-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <table class="table table-striped table-hover">
                <tr>
                    <th>Ticket No</th>
                    <td>{{ $ticket->ticket_no }}</td>
                </tr>

                <tr>
                    <th>Amount</th>
                    <td>Rs. {{ number_format($ticket->total_amount, 2) }}</td>
                </tr>

                <tr>
                    <th>Payment</th>
                    <td>{!! $ticket->getPaidLabelAttribute() !!}</td>
                </tr>

                <tr>
                    <th>Full Name of the Driver</th>
                    <td>{{ $ticket->motorist->user->name }}</td>
                </tr>

                <tr>
                    <th>Address of the Driver</th>
                    <td>{{ $ticket->motorist->user->address }}</td>
                </tr>

                <tr>
                    <th>Vehicle No</th>
                    <td>{{ $ticket->vehicle_no }}</td>
                </tr>

                <tr>
                    <th>D/L No</th>
                    <td>{{ $ticket->motorist->license_no }}</td>
                </tr>

                <tr>
                    <th>NIC No</th>
                    <td>{{ $ticket->motorist->user->nic }}</td>
                </tr>

                <tr>
                    <th>Competent to Drive</th>
                    <td>
                        @foreach($ticket->motorist->vehicleClasses as $class)
                            {{ $class->class }},
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th>Date and Time of Offence</th>
                    <td>{{ $ticket->created_at->toDayDateTimeString() }}</td>
                </tr>

                <tr>
                    <th>Place</th>
                    <td>{{ $ticket->location }} ({{ $ticket->lat }}, {{ $ticket->lng }})</td>
                </tr>

                <tr>
                    <th>Police Station</th>
                    <td>{{ $ticket->station->name }}</td>
                </tr>

                <tr>
                    <th>Issuing Officer</th>
                    <td>{{ $ticket->officer->user->name }} ({{ $ticket->officer->badge_no }})</td>
                </tr>

                <tr>
                    <th>Valid From</th>
                    <td>{{ $ticket->created_at->toFormattedDateString() }}</td>
                </tr>

                <tr>
                    <th>Valid To</th>
                    <td>{{ $ticket->created_at->addDays(14)->toFormattedDateString() }}</td>
                </tr>

                <tr>
                    <th>Court</th>
                    <td>{{ $ticket->station->court->name }}</td>
                </tr>

                <tr>
                    <th>Court Date</th>
                    <td>{{ $ticket->created_at->addDays(24)->toFormattedDateString() }}</td>
                </tr>

                <tr>
                    <th>Remarks</th>
                    <td>{{ $ticket->remarks }}</td>
                </tr>

                <tr>
                    <th colspan="2">Offence Summery</th>
                </tr>

                <tr>
                    <th>Offence</th>
                    <th>Fine (Rs.)</th>
                </tr>

                @foreach($ticket->offences as $offence)
                <tr>
                    <td>{{ $offence->description }}</td>
                    <td>{{ number_format($offence->fine, 2) }}</td>
                </tr>
                @endforeach

                <tr>
                    <th>Subtotal</th>
                    <td>{{ number_format($ticket->total_amount, 2) }}</td>
                </tr>

            </table>

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection