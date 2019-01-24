@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.fine.offences.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.fine.offences.management') }}
        <small>{{ trans('labels.backend.fine.offences.all') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.fine.offences.all') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.fine.includes.partials.offence-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="offences-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.fine.offences.table.id') }}</th>
                        <th>{{ trans('labels.backend.fine.offences.table.description') }}</th>
                        <th>{{ trans('labels.backend.fine.offences.table.fine') }}</th>
                        <th>{{ trans('labels.backend.fine.offences.table.dip') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Offence') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

    <script>
        $(function () {
            $('#offences-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.fine.offence.get") }}',
                    type: 'post',
                    data: {}
                },
                columns: [
                    {data: 'id', name: '{{config('fine.offences_table')}}.id'},
                    {data: 'description', name: '{{config('fine.offences_table')}}.description'},
                    {data: 'fine', name: '{{config('fine.offences_table')}}.fine'},
                    {data: 'dip', name: '{{config('fine.offences_table')}}.dip'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
