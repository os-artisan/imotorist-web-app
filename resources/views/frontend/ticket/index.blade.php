@extends('frontend.layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 text-center mb-40 print-hidden">
            <h2>Let's Find Your Ticket!</h2>
            <hr class="short panel-primary">
            <form action="{{route('frontend.ticket.post')}}" method="POST" accept-charset="utf-8">
                {{csrf_field()}}
                <div class="input-group col-lg-8 col-lg-offset-2">
                    <input type="text" class="input-lg form-control" placeholder="Enter Your Ticket Number" id="ticket_no" name="ticket_no" required="required" value="{{ isset($keyword) ? $keyword : ''}}" maxlength="{{ config('fine.ticket_no.length') }}" />
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-lg" type="submit">
                        <span class=" glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>

        <div id="results">
            @if(isset($ticket))
                @include('frontend.ticket.partials.ticket')
            @endif
        </div>
    </div>

    <section class="bg-primary download print-hidden">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 text-center mb-60 mt-35">
                <h2>Find out how you're doing as a Driver!</h2>
                <hr class="short">
                <p class="fs-115 mb-22">It is completely free and will remain free forever!</p>
                {{ link_to_route('frontend.auth.register', 'Signup today!', [], ['class' => 'btn btn-default btn-lg' ]) }}
            </div>
        </div>
    </section>

@endsection

@section('after-scripts')
    @if(isset($ticket))
        @include('frontend.ticket.partials.map-script')
    @endif
@endsection