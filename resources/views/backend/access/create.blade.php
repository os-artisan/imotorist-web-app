@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.create'))

@section('before-styles')
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css') }}
@endsection


@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.access.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('surname', trans('validation.attributes.backend.access.users.surname'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('surname', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.surname')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('other_names', trans('validation.attributes.backend.access.users.other_names'),
                     ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('other_names', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.other_names')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.backend.access.users.password'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('validation.attributes.backend.access.users.password_confirmation'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('phone', trans('validation.attributes.backend.access.users.phone'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('phone', null, ['class' => 'form-control', 'maxlength' => '10', 'placeholder' => trans('validation.attributes.backend.access.users.phone')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('address', trans('validation.attributes.backend.access.users.address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('address', null, ['class' => 'form-control', 'maxlength' => '255', 'placeholder' => trans('validation.attributes.backend.access.users.address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('date_of_birth', trans('validation.attributes.backend.access.users.date_of_birth'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <div class='input-group date'>
                            {{ Form::text('date_of_birth', null, ['class' => 'form-control', 'data-date-format' => 'yyyy-mm-dd', 'maxlength' => '15', 'id' => 'datepicker', 'placeholder' => trans('validation.attributes.backend.access.users.date_of_birth')]) }}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('nic', trans('validation.attributes.backend.access.users.nic'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('nic', null, ['class' => 'form-control', 'maxlength' => '15', 'placeholder' => trans('validation.attributes.backend.access.users.nic')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('passport', trans('validation.attributes.backend.access.users.passport'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('passport', null, ['class' => 'form-control', 'maxlength' => '15', 'placeholder' => trans('validation.attributes.backend.access.users.passport')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('status', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('confirmed', trans('validation.attributes.backend.access.users.confirmed'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('confirmed', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('verified', trans('validation.attributes.backend.access.users.verified'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('verified', '0', false) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.users.send_confirmation_email') }}<br/>
                        <small>{{ trans('strings.backend.access.users.if_confirmed_off') }}</small>
                    </label>

                    <div class="col-lg-1">
                        {{ Form::checkbox('confirmation_email', '1') }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('associated_roles', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-3">
                        @if (count($roles) > 0)
                            @foreach($roles as $role)
                                <input type="checkbox" value="{{ $role->id }}" name="assignees_roles[{{ $role->id }}]" id="role-{{ $role->id }}" {{ is_array(old('assignees_roles')) && in_array($role->id, old('assignees_roles')) ? 'checked' : '' }} /> <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                <a href="#" data-role="role_{{ $role->id }}" class="show-permissions small">
                                    (
                                        <span class="show-text">{{ trans('labels.general.show') }}</span>
                                        <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                        {{ trans('labels.backend.access.users.permissions') }}
                                    )
                                </a>
                                <br/>
                                <div class="permission-list hidden" data-role="role_{{ $role->id }}">
                                    @if ($role->all)
                                        {{ trans('labels.backend.access.users.all_permissions') }}<br/><br/>
                                    @else
                                        @if (count($role->permissions) > 0)
                                            <blockquote class="small">{{--
                                        --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                                @endforeach
                                            </blockquote>
                                        @else
                                            {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                                        @endif
                                    @endif
                                </div><!--permission list-->
                            @endforeach
                        @else
                            {{ trans('labels.backend.access.users.no_roles') }}
                        @endif
                    </div><!--col-lg-3-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-default">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js') }}
    <script type="text/javascript">
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
@endsection
