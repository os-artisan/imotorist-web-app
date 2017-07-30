@extends('frontend.layouts.app')

@section('content')

    <div class="container">

        <div class="row">
        
            <div class="col-md-8 col-md-offset-2">
        
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('labels.frontend.auth.register_box_title') }}</div>
        
                    <div class="panel-body">
        
                        <form action="{{route('frontend.auth.register.post')}}" method="POST" class="form-horizontal" accept-charset="utf-8">
                            {{csrf_field()}}
        
                        <div class="form-group">
                            <label for="surname" class="control-label col-md-4">{{trans('validation.attributes.frontend.surname')}}</label>
                            <div class="col-md-6">
                                <input maxlength="191" required="required" autofocus="autofocus" name="surname" type="text" class="form-control" placeholder="{{trans('validation.attributes.frontend.surname')}}">
                            </div><!--col-md-6-->
                        </div><!--form-group-->
        
                        <div class="form-group">
                            <label for="other_names" class="control-label col-md-4">{{trans('validation.attributes.frontend.other_names')}}</label>
                            <div class="col-md-6">
                                <input maxlength="191" required="required" name="other_names" type="text" class="form-control" placeholder="{{trans('validation.attributes.frontend.other_names')}}">
                            </div><!--col-md-6-->
                        </div><!--form-group-->
        
                        <div class="form-group">
                            <label for="email" class="control-label col-md-4">{{trans('validation.attributes.frontend.email')}}</label>
                            <div class="col-md-6">
                                <input maxlength="191" required="required" name="email" type="email" class="form-control" placeholder="{{trans('validation.attributes.frontend.email')}}">
                            </div><!--col-md-6-->
                        </div><!--form-group-->
        
                        <div class="form-group">
                            <label for="password" class="control-label col-md-4">{{trans('validation.attributes.frontend.password')}}</label>
                            <div class="col-md-6">
                                <input required="required" name="password" type="password" class="form-control" placeholder="{{trans('validation.attributes.frontend.password')}}">
                            </div><!--col-md-6-->
                        </div><!--form-group-->
        
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label col-md-4">{{trans('validation.attributes.frontend.password_confirmation')}}</label>
                            <div class="col-md-6">
                                <input required="required" name="password_confirmation" type="password" class="form-control" placeholder="{{trans('validation.attributes.frontend.password_confirmation')}}">
                            </div><!--col-md-6-->
                        </div><!--form-group-->
        
                        @if (config('access.captcha.registration'))
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::captcha() !!}
                                    {{ Form::hidden('captcha_status', 'true') }}
                                </div><!--col-md-6-->
                            </div><!--form-group-->
                        @endif
        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" value="{{trans('labels.frontend.auth.register_button')}}" class="btn btn-primary btn-block">
                            </div><!--col-md-6-->
                        </div><!--form-group-->
        
                        </form>
        
                    </div><!-- panel body -->
        
                </div><!-- panel -->
        
            </div><!-- col-md-8 -->
        
        </div><!-- row -->

    </div><!-- container -->
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endsection