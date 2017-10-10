@extends('frontend.layouts.app')

@section('content')

    <header>
        <div class="header-content">
            <div class="header-content-inner text-center">
                <h1 class="mb-20">New Way of Paying Traffic Fines in Sri Lanka!</h1>
                <hr class="short">
                <p class="mb-22 fs-115">Our traffic fine payment service works just like an electronic account payment. It is a simple and secure way to pay traffic fines with very little effort.</p>
                <a href="#about" class="btn btn-primary btn-lg js-scroll-trigger">Find Out More!</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2 text-center mb-60 mt-35">
                <h2>Oh, Hi There!</h2>
                <hr class="short">
                <p class="fs-115 mb-22">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div class="input-group col-lg-8 col-lg-offset-2">
                    <input type="text" class="input-lg form-control" placeholder="Ticket #" />
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-lg" type="button">
                        <span class=" glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
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

    <section class="bg-primary download">
        <div class="container">
            <div class="col-md-8 col-lg-offset-2 text-center mb-60 mt-35">
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