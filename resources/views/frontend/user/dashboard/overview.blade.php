@extends('frontend.user.dashboard')

@section('user-content')

<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-minimal">
            <div class="panel-body">
                <i class="fa fa-smile-o fa-5x"></i>
                <div class="pull-right text-right">
                    <h2 class="mt-5">24</h2>
                    <h4 class="mb-0"><strong>Driver Points</strong></h4>
                </div>
            </div><!--panel body-->
        </div><!-- panel -->
    </div>
    <div class="col-lg-4">
        <div class="panel panel-minimal">
            <div class="panel-body">
                <i class="fa fa-file-text-o fa-5x"></i>
                <div class="pull-right text-right">
                    <h2 class="mt-5">{{ $logged_in_user->countUnpaidTickets() }}</h2>
                    <h4 class="mb-0"><strong>Unpaid Tickets</strong></h4>
                </div>
            </div><!--panel body-->
        </div><!-- panel -->
    </div>
    <div class="col-lg-4">
        <div class="panel panel-minimal">
            <div class="panel-body">
                <i class="fa fa-pagelines fa-5x"></i>
                <div class="pull-right text-right">
                    <h2 class="mt-5">50</h2>
                    <h4 class="mb-0"><strong>Green Points</strong></h4>
                </div>
            </div><!--panel body-->
        </div><!-- panel -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-minimal panel-primary">
            <div class="panel-heading">
                <h4 class="pl-15 pr-15">My Tickets</h4>
            </div><!-- /.panel-header -->
            <div class="panel-body">
                <div class="col-lg-12">

                @if($logged_in_user->countTickets() > 0)
                    <div class="table-responsive">
                        <table id="tickets-table" class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>Ticket #</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Fine (Rs.)</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-right">{{ trans('labels.general.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logged_in_user->motorist->tickets->sortByDesc('created_at') as $ticket)
                                <tr>
                                    <th>{{ $ticket->ticket_no }}</th>
                                    <th class="text-center">{{ $ticket->created_at->toFormattedDateString() }}</th>
                                    <th class="text-center">{{ $ticket->total_amount }}</th>
                                    <th class="text-center">{!! $ticket->getPaidLabelAttribute() !!}</th>
                                    <th class="text-right">
                                        <a href="{{ route('frontend.ticket.show', $ticket->ticket_no) }}" class="btn btn-xs btn-default">
                                            <i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"></i>
                                        </a>
                                        <form action="{{route('frontend.cart.store')}}" method="POST" accept-charset="utf-8" class="pull-right">
                                            {{csrf_field()}}
                                            <input type="hidden" name="ticket_no[]" value="{{ $ticket->ticket_no }}">
                                            <button type="submit" class="btn btn-xs btn-primary ml-10 {{ ($ticket->inCart() || $ticket->isPaid()) ? 'disabled' : ''}}">
                                                <i class="fa fa-cart-plus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"></i>
                                            </button>
                                        </form>
                                    </th>   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                @else
                    <p class="mb-0">You don't have any traffic tickets so far.</p>
                @endif

                </div>
            </div><!--panel body-->
        </div><!-- panel -->
    </div>
</div>

@endsection