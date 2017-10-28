<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart fa-lg"></i>
        
        @if(count($logged_in_user->carts) > 0)
            <span class="label label-primary">{{ count($logged_in_user->carts) }}</span>
        @endif
    </a>
    <ul class="dropdown-menu notify-drop">
        <div class="notify-drop-title bg-primary">
            <div class="row">
                @if(count($logged_in_user->carts) > 0)
                <div class="col-xs-12"><strong>Items<span class="pull-right">Amount</span></strong></div>
                @else
                <div class="col-xs-12">Cart</div>
                @endif
            </div>
        </div><!-- notify drop title -->

        <div class="drop-content">
            <li class="mb-0">
                <div class="col-xs-12">
                    @if(count($logged_in_user->carts) > 0)
                    <span>{{ count($logged_in_user->carts) }}</span>
                    <span class="pull-right">Rs. {{ number_format((float)$logged_in_user->carts->sum('total'), 2) }}</span>
                    @else
                    <span>Your cart is empty</span>
                    @endif
                </div>
            </li>
        </div><!-- drop content -->

        <div class="notify-drop-footer">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('frontend.cart.index') }}" class="btn btn-sm btn-link pl-0"><i class="fa fa-shopping-cart mr-5"></i>View Cart</a>
                    <form action="{{route('frontend.checkout.store')}}" method="POST" accept-charset="utf-8" class="pull-right">
                        {{csrf_field()}}
                        @foreach($logged_in_user->carts as $cart)
                        <input type="hidden" name="ticket_no[]" value="{{ $cart->ticket->ticket_no }}">
                        @endforeach
                        <button type="submit" class="btn btn-sm btn-primary" {{ (count($logged_in_user->carts) > 0) ? '' : 'disabled' }}>Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </ul>
</li>