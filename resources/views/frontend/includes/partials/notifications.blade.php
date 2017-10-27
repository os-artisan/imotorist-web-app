<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-bell fa-lg"></i>
        
        @if(count($logged_in_user->unreadNotifications) > 0)
            <span class="label label-primary">{{ count($logged_in_user->unreadNotifications) }}</span>
        @endif
    </a>
    <ul class="dropdown-menu notify-drop">
        <div class="notify-drop-title bg-primary">
            <div class="row">
                <div class="col-xs-12">Notifications</div>
            </div>
        </div><!-- notify drop title -->

        <div class="drop-content">

        @foreach($logged_in_user->unreadNotifications as $notification)

            <li class="alert mb-0">
                <div class="col-xs-12"><a href="{{ route('frontend.notification.markspecificasread', $notification->id) }}" data-dismiss="alert" aria-label="close" class="close">×</a>
                    @include('notifications.' . snake_case(class_basename($notification->type)))
                </div>
            </li>

        @endforeach

        </div><!-- drop content -->

        <div class="notify-drop-footer text-center">
            <div class="row">
                <div class="col-xs-12">
                    @if(count($logged_in_user->unreadNotifications) > 0)
                    <a href="{{ route('frontend.notification.markallasread')}}" class="btn btn-sm btn-link"><i class="fa fa-eye"></i> Mark as read</a>
                    @else
                    <p class="mb-5 mt-5">No new notifications</p>
                    @endif
                </div>
            </div>
        </div>
    </ul>
</li>