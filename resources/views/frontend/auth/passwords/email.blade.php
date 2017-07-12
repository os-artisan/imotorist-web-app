@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</div>

                <div class="panel-body">

                    <form action="{{route('frontend.auth.password.email.post')}}" method="POST" class="form-horizontal" accept-charset="utf-8">
                        {{csrf_field()}}

                    <div class="form-group">
                        <label for="email" class="control-label col-md-4">{{trans('validation.attributes.frontend.email')}}</label>
                        <div class="col-md-6">
                            <input maxlength="191" required="required" autofocus="autofocus" name="email" type="email" class="form-control" placeholder="{{trans('validation.attributes.frontend.email')}}">
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="{{trans('labels.frontend.passwords.send_password_reset_link_button')}}" class="btn btn-primary btn-block">
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    </form>

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection