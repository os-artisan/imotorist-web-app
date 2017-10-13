<footer>
    <div class="container">
        <div class="row" >
            <div class="col-md-3">
                <a href="{{route('frontend.index')}}" class="footer-logo">
                    <img src="{{ asset('img/imotorist-logo-light.svg') }}" alt="{{app_name()}} Logo">
                </a>
                <p>On the spot, traffic fine payment service works just like an electronic account payment. It is a simple and secure way to pay traffic fines with very little effort.</p>
            </div>
            <div class="col-md-4 footer-nav animated fadeInUp">
                <h4>Menu</h4>
                <div class="col-md-6 pl-0">
                    <ul class="pages">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Affiliate</a></li>
                        <li><a href="#">Mobile Apps</a></li>
                    </ul>
                </div>
                <div class="col-md-6 pl-0">
                    <ul class="list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 footer-social animated fadeInDown">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">RSS</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-ns animated fadeInRight">
                <h4>Newsletter</h4>
                <p>Stay up to date with our latest news and products.</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ trans('validation.attributes.frontend.email') }}">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </span>
                </div><!-- /input-group -->
            </div>
        </div>
    </div><!-- /container -->
</footer>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="copyright text-center">
                <strong>Copyright &copy; {{ (date('Y')==2017) ? date('Y') : '2017-'.date('Y') }} <a href="#">{{ app_name() }}</a>.</strong> {{ trans('strings.backend.general.all_rights_reserved') }}
            </div>
        </div>
    </div><!-- /container -->
</div>