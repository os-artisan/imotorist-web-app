<nav class="navbar navbar-default main-header navbar-fixed-top {{ Request::is('/') ? 'transparent-nav' : '' }}">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="{{route('frontend.index')}}" class="navbar-logo">
                @desktop
                    <img src="{{ Request::is('/') ? asset('img/imotorist-logo-light.svg') : asset('img/imotorist-logo.svg') }}" alt="{{app_name()}} Logo" id="header-brand">
                @elsedesktop
                    <img src="{{ asset('img/imotorist-logo.svg') }}" alt="{{app_name()}} Logo" id="header-brand">
                @enddesktop
            </a>
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
            <ul class="nav navbar-nav">
                {{-- <li>{{ link_to_route('frontend.macros', trans('navs.frontend.macros'), [], ['class' => active_class(Active::checkRoute('frontend.macros')) ]) }}</li> --}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ trans('menus.frontend.services') }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('frontend.ticket', trans('menus.frontend.ticket-payment'), [], ['class' => active_class(Active::checkRoute('frontend.ticket')) ]) }}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ trans('menus.frontend.information') }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/info">{{ trans('menus.frontend.signs') }}</a></li>
                        <li><a href="/info">{{ trans('menus.frontend.offences') }}</a></li>
                        <li><a href="/info">{{ trans('menus.frontend.safety') }}</a></li>
                        <li><a href="/info">{{ trans('menus.frontend.statistics') }}</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ trans('menus.language-picker.language') }}
                            <span class="caret"></span>
                        </a>

                        @include('includes.partials.lang')
                    </li>
                @endif

                @if ($logged_in_user)

                    <!-- Shopping Cart -->
                    @include('frontend.includes.partials.cart')

                    <!-- Notifications -->
                    @include('frontend.includes.partials.notifications')

                    <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard'), [], ['class' => active_class(Active::checkRoute('frontend.user.dashboard')). ' visible-lg' ]) }}</li>
                @endif

                @if (! $logged_in_user)
                    <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login'), [], ['class' => active_class(Active::checkRoute('frontend.auth.login')) ]) }}</li>

                    @if (config('access.users.registration'))
                        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register'), [], ['class' => active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ substr($logged_in_user->other_names,0,20) }}{{ (strlen($logged_in_user->other_names) > 20) ? "..." : "" }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @permission('view-backend')
                                <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth
                            <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard'), [], ['class' => active_class(Active::checkRoute('frontend.user.dashboard')). ' hidden-lg' ]) }}</li>
                            <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => active_class(Active::checkRoute('frontend.user.account')) ]) }}</li>
                            <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>