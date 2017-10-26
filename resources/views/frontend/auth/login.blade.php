@extends('frontend.layouts.app')

@section('content')

    <div class="container">

        <div class="row">
        
            <div class="col-md-8 col-md-offset-2">
        
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('labels.frontend.auth.login_box_title') }}</div>
        
                    <div class="panel-body">
        
                        <form action="{{route('frontend.auth.login.post')}}" method="POST" class="form-horizontal" accept-charset="utf-8">
                            {{csrf_field()}}
        
                            <div class="form-group">
                                <label for="username" class="control-label col-md-4">{{trans('validation.attributes.frontend.username')}}</label>
                                <div class="col-md-6">
                                    <input maxlength="191" required="required" autofocus="autofocus" name="username" type="text" class="form-control" placeholder="{{trans('validation.attributes.frontend.email_or_phone')}}">
                                </div><!--col-md-6-->
                            </div><!--form-group-->
        
                            <div class="form-group">
                                <label for="password" class="control-label col-md-4">{{trans('validation.attributes.frontend.password')}}</label>
                                <div class="col-md-6">
                                    <input required="required" name="password" type="password" class="form-control" placeholder="{{trans('validation.attributes.frontend.password')}}">
                                </div><!--col-md-6-->
                            </div><!--form-group-->
        
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox checkbox-primary">
                                        <input name="remember" type="checkbox" value="1">
                                        <label for="remember">{{ trans('labels.frontend.auth.remember_me') }}</label>
                                    </div>
                                </div><!--col-md-6-->
                            </div><!--form-group-->
        
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 text-center">
                                    <input type="submit" value="{{trans('labels.frontend.auth.login_button')}}" class="btn btn-primary btn-block mb-15">
                                    <a href="{{route('frontend.auth.password.reset')}}">{{trans('labels.frontend.passwords.forgot_password')}}</a>
                                </div><!--col-md-6-->
                            </div><!--form-group-->
                            
                        </form>
        
                        <div class="row text-center">
                            {!! $socialite_links !!}
                        </div>
                    </div><!-- panel body -->
        
                </div><!-- panel -->
        
            </div><!-- col-md-8 -->
        
        </div><!-- row -->

    </div><!-- container -->
@endsection