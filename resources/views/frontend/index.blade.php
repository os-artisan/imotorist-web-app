@extends('frontend.layouts.app')

@section('content')

    <header>
        <div class="header-content">
            <div class="header-content-inner text-center">
                <h1 class="mb-20">New Way of Paying Traffic Fines in Sri Lanka!</h1>
                <p class="mb-22 fs-115">Our traffic fine payment service works just like an electronic account payment. It is a simple and secure way to pay traffic fines with very little effort.</p>
                <a href="#search" class="btn btn-primary btn-lg js-scroll-trigger">Find Out More!</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="search">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2 text-center mb-60 mt-35">
                <h2>Oh, Hi There!</h2>
                <hr class="short">
                <p class="fs-115 mb-22">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
        </div>
    </section>

    <section id="services" class="services">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1 mb-45 mt-35">
                    <h2>Our Services</h2>
                    <hr class="short panel-primary">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-22">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                                </span>
                                <h4>
                                <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-22">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-compass fa-stack-1x text-primary"></i>
                                </span>
                                <h4>
                                <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-22">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-flask fa-stack-1x text-primary"></i>
                                </span>
                                <h4>
                                <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-22">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-shield fa-stack-1x text-primary"></i>
                                </span>
                                <h4>
                                <strong>Service Name</strong>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2>Stop Waiting.<br>Start Riding.</h2>
                {{ link_to_route('frontend.auth.register', 'Let\'s Get Started!', [], ['class' => 'btn btn-primary btn-lg' ]) }}
            </div>
        </div>
        <div class="overlay"></div>
    </section>


    <section class="bg-dark pt-30 pb-10">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="col-md-3 col-sm-6 mb-15">
                        <div class="single_counter">
                            <i class="fa fa-3x fa-users"></i>
                            <h2 class="statistic-counter">14,876</h2>
                            <h4>Users</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-15">
                        <div class="single_counter">
                            <i class="fa fa-3x fa-file-text"></i>
                            <h2 class="statistic-counter">407,301</h2>
                            <h4>Issued Tickets</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-15">
                        <div class="single_counter">
                            <i class="fa fa-3x fa-credit-card"></i>
                            <h2 class="statistic-counter">127,922</h2>
                            <h4>Ticket Payments</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-15">
                        <div class="single_counter">
                            <i class="fa fa-3x fa-heart"></i>
                            <h2 class="statistic-counter">7,346</h2>
                            <h4>Positive Reviews</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary download">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 text-center mb-60 mt-35">
                <h2>Discover what all the buzz is about!</h2>
                <hr class="short">
                <p class="fs-115 mb-22">Our app is also available on any mobile device! Download now to get started!</p>
                <div class="badges">
                    <a class="badge-link" href="#"><img src="img/google-play-badge.svg" alt=""></a>
                    <a class="badge-link" href="#"><img src="img/app-store-badge.svg" alt=""></a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('after-scripts')
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                var windowsize = $(window).width();
                if (scroll < 500 && windowsize > 768) {
                    $(".navbar-fixed-top").addClass("transparent-nav");
                    $("#header-brand").attr("src","img/imotorist-logo-light.svg");
                }
                else {
                    $('.navbar-fixed-top').removeClass("transparent-nav");
                    $("#header-brand").attr("src","img/imotorist-logo.svg");
                }
            })
        })
    </script>
@endsection