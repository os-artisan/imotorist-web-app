@extends('frontend.layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12 text-center">
        <h1>My Cart</h1>
        <hr class="short panel-primary">
    </div>
    <div class="col-lg-9">
        <div class="panel panel-minimal panel-primary">
            <div class="panel-heading"><strong>Your Cart: </strong>{{ (count($carts) > 0) ? count($carts).' ticket(s)' : 'is empty'}}</div>
            @if (count($carts) > 0)  
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
                        @foreach($carts as $cart)
                        <tr>
                            <td class="pl-15">{{ $cart->ticket->ticket_no }}</td>
                            <td class="text-right">{{ number_format($cart->ticket->total_amount, 2) }}</td>
                            <td class="text-right pr-15">
                                <a href="{{ route('frontend.ticket.show', $cart->ticket->ticket_no) }}" class="btn btn-xs btn-default">
                                    <i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"></i>
                                </a>
                                <form action="{{route('frontend.cart.destroy', $cart->ticket->ticket_no)}}" method="POST" accept-charset="utf-8" class="pull-right">
                                    {{ method_field('DELETE') }}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger btn-xs ml-10"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($carts) > 0)
                        <h5 class="pull-right fs-115"><strong>Subtotal: Rs. {{ $total }}</strong></h5>
                        @else
                        <p class="mt-10">Add tickets to your cart</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <form action="{{route('frontend.checkout.store')}}" method="POST" accept-charset="utf-8">
            {{csrf_field()}}
            @foreach($carts as $cart)
            <input type="hidden" name="ticket_no[]" value="{{ $cart->ticket->ticket_no }}">
            @endforeach
            <button type="submit" class="btn btn-primary btn-lg btn-block mb-22" {{ (count($carts) > 0) ? '' : 'disabled' }}>Checkout</button>
        </form>
    </div>
</div>

<section class="bg-primary download">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 text-center mb-60 mt-35">
            <h2>Earn Green Points!</h2>
            <hr class="short">
            <p class="fs-115 mb-22">Sri Lanka is always at forefront when it comes to green living regulations. Another great initiative by Sri Lankan Roads and Transport Authority (RTA) green point system. RTA launched reward schemes for public transport commuters and users of its apps.</p>
            <a href="#" class="btn btn-lg btn-default">Find Out More!</a>
        </div>
    </div>
</section>

@endsection