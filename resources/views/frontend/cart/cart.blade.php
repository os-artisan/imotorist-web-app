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
                            <td class="text-right">{{ $cart->ticket->total_amount }}</td>
                            <td class="text-right pr-15">
                                <form action="{{route('frontend.cart.destroy', $cart->ticket->ticket_no)}}" method="POST" accept-charset="utf-8">
                                    {{ method_field('DELETE') }}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
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

@endsection