@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.fine.offences.management') . ' | ' . trans('labels.backend.fine.offences.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.fine.offences.management') }}
        <small>{{ trans('labels.backend.fine.offences.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.fine.offence.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.fine.offences.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.fine.includes.partials.offence-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('description', trans('validation.attributes.backend.fine.offences.description'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('description', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.fine.offences.description')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('description_si', trans('validation.attributes.backend.fine.offences.description_si'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('description_si', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.fine.offences.description_si')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('fine', trans('validation.attributes.backend.fine.offences.fine'),
                     ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('fine', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.fine.offences.fine')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('dip', trans('validation.attributes.backend.fine.offences.dip'),
                     ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::number('dip', null, ['class' => 'form-control', 'required' => 'required', 'min' => '0', 'placeholder' => trans('validation.attributes.backend.fine.offences.dip')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-default">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.fine.offence.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection
