@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.fine.offences.management') . ' | ' . trans('labels.backend.fine.offences.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.fine.offences.management') }}
        <small>{{ trans('labels.backend.fine.offences.view') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.fine.offences.view') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.fine.includes.partials.offence-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <table class="table table-striped table-hover">
                <tr>
                    <th>{{ trans('labels.backend.fine.offences.table.description') }}</th>
                    <td>{{ $offence->description }}</td>
                </tr>

                <tr>
                    <th>{{ trans('labels.backend.fine.offences.table.description_si') }}</th>
                    <td>{{ $offence->description_si }}</td>
                </tr>

                <tr>
                    <th>{{ trans('labels.backend.fine.offences.table.fine') }}</th>
                    <td>{{ $offence->fine }}</td>
                </tr>

                <tr>
                    <th>{{ trans('labels.backend.fine.offences.table.dip') }}</th>
                    <td>{{ $offence->dip }}</td>
                </tr>

                <tr>
                    <th>{{ trans('labels.backend.fine.offences.table.created_at') }}</th>
                    <td>{{ $offence->created_at }} ({{ $offence->created_at->diffForHumans() }})</td>
                </tr>

                <tr>
                    <th>{{ trans('labels.backend.fine.offences.table.last_updated') }}</th>
                    <td>{{ $offence->updated_at }} ({{ $offence->updated_at->diffForHumans() }})</td>
                </tr>
            </table>

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection