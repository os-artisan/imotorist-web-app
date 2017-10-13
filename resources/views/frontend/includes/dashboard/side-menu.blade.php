<div class="panel panel-minimal">

    <div class="profile-sidebar">

        <ul class="media-list text-center panel-body">
            <li class="media">
                <div class="user-image">
                    <img class="media-object profile-picture img-responsive thumbnail" src="{{ $logged_in_user->picture }}" alt="Profile picture">
                </div><!--media-left-->

                <div class="media-body">
                    <h4 class="media-heading">
                        {{ $logged_in_user->name }}<br/>
                        <small>
                            {{ $logged_in_user->email }}<br/>
                            Joined {{ $logged_in_user->created_at->format('F jS, Y') }}<br/>
                            {{ trans('navs.frontend.user.status') }} : 
                                {!! $logged_in_user->getVerifiedLabelAttribute() !!}
                        </small>
                    </h4>
                </div><!--media-body-->
            </li><!--media-->
        </ul><!--media-list-->

        <div class="side-menu">
            <ul class="nav">
                <li class="{{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">
                    <a href="{{ route('frontend.user.dashboard') }}">
                    <i class="glyphicon glyphicon-home"></i>
                    {{ trans('navs.frontend.overview') }}</a>
                </li>
                <li class="{{ active_class(Active::checkRoute('frontend.user.account')) }}">
                    <a href="{{ route('frontend.user.account') }}">
                    <i class="glyphicon glyphicon-user"></i>
                    {{ trans('navs.frontend.user.account') }}</a>
                </li>
                <li class="">
                    <a href="">
                    <i class="fa fa-id-card"></i>
                    License</a>
                </li>
                @permission('view-backend')
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                    <i class="glyphicon glyphicon-blackboard"></i>
                    {{ trans('navs.frontend.user.administration') }}</a>
                </li>
                @endauth
                <li>
                    <a href="#" target="_blank">
                    <i class="glyphicon glyphicon-ok"></i>
                    History</a>
                </li>
                <li>
                    <a href="#">
                    <i class="glyphicon glyphicon-cog"></i>
                    Settings</a>
                </li>
            </ul>
        </div>

    </div>
</div><!-- panel -->