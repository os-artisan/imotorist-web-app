@extends('frontend.layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12 text-center">
            <h1 class="section-header">Get in Touch with us</h1>
            <hr class="short panel-primary">
            <p class="fs-115 mb-35">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
        <div class="col-lg-12 mb-50">
            <form>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input type="text" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter Email Address">
                    </div>  
                    <div class="form-group">
                        <label for="phone">Phone No.</label>
                        <input type="tel" class="form-control" placeholder="Enter 10-digit mobile no.">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for ="description">Message</label>
                        <textarea class="form-control" placeholder="Enter Your Message" style="height: 140px;"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane mr-10" aria-hidden="true"></i>Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection