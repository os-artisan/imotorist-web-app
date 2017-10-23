@extends('frontend.layouts.app')

@section('content')

    <div class="container">

        <div class="col-md-3">

            @include('frontend.includes.dashboard.side-menu')

        </div><!-- col-md-3 -->

        <div class="col-md-9">

            @yield('user-content')

        </div><!-- col-md-9 -->

    </div><!-- container -->
@endsection
