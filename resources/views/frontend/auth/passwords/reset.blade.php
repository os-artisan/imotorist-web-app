@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</div>

                <div class="panel-body">

                    <form action="{{route('frontend.auth.password.reset')}}" method="POST" class="form-horizontal" accept-charset="utf-8">
                        {{csrf_field()}}

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="control-label col-md-4">{{trans('validation.attributes.frontend.email')}}</label>
                            <div class="col-md-6">
                                <p class="form-control-static">{{ $email }}</p>
                                {{ Form::hidden('email', $email, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                    <div class="form-group">
                        <label for="password" class="control-label col-md-4">{{trans('validation.attributes.frontend.password')}}</label>
                        <div class="col-md-6">
                            <input required="required" autofocus="autofocus" name="password" type="password" class="form-control" placeholder="{{trans('validation.attributes.frontend.password')}}">
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <label for="password_confirmation" class="control-label col-md-4">{{trans('validation.attributes.frontend.password_confirmation')}}</label>
                        <div class="col-md-6">
                            <input required="required" name="password_confirmation" type="password" class="form-control" placeholder="{{trans('validation.attributes.frontend.password_confirmation')}}">
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="{{trans('labels.frontend.passwords.reset_password_button')}}" class="btn btn-primary btn-block">
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    </form>

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection
