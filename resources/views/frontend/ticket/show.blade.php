@extends('frontend.layouts.app')

@section('content')

    <div class="container">
        @include('frontend.ticket.partials.ticket')
    </div>

@endsection

@section('after-scripts')
    @if(isset($ticket))
        @include('frontend.ticket.partials.map-script')
    @endif
@endsection