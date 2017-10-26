<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart fa-lg"></i>
        
        @if(count($logged_in_user->unreadNotifications) > 0)
            <span class="label label-primary">{{ count($logged_in_user->unreadNotifications) }}</span>
        @endif
    </a>
    <ul class="dropdown-menu notify-drop">
        <div class="notify-drop-title bg-primary">
            <div class="row">
                <div class="col-xs-12"><strong>Items<span class="pull-right">Amount</span></strong></div>
            </div>
        </div><!-- notify drop title -->

        <div class="drop-content">
            <li class="mb-0">
                <div class="col-xs-12">
                    <div class="col-xs-6 pl-0">3</div>
                    <div class="col-xs-6 pr-0 text-right">Rs. 16000.00</div>
                </div>
            </li>
        </div><!-- drop content -->

        <div class="notify-drop-footer">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('frontend.cart') }}" class="btn btn-sm btn-link pl-0"><i class="fa fa-shopping-cart mr-5"></i>View Cart</a>
                    <form action="{{route('frontend.checkout.store')}}" method="POST" accept-charset="utf-8" class="pull-right">
                        {{csrf_field()}}
                        <input type="hidden" name="ticket_no[]" value="QI2RU7">
                        <input type="hidden" name="ticket_no[]" value="2UKWMK">
                        <button type="submit" class="btn btn-sm btn-primary">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </ul>
</li>