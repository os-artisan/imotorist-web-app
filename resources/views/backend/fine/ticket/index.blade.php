@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.fine.tickets.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.fine.tickets.management') }}
        <small>{{ trans('labels.backend.fine.tickets.all') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.fine.tickets.all') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.fine.includes.partials.ticket-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="tickets-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.fine.tickets.table.id') }}</th>
                        <th>{{ trans('labels.backend.fine.tickets.table.ticket_no') }}</th>
                        <th>{{ trans('labels.backend.fine.tickets.table.total_amount') }}</th>
                        <th>{{ trans('labels.backend.fine.tickets.table.paid') }}</th>
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
            {!! history()->renderType('ticket') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

    <script>
        $(function () {
            $('#tickets-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.fine.ticket.get") }}',
                    type: 'post',
                    data: {}
                },
                columns: [
                    {data: 'id', name: '{{config('fine.tickets_table')}}.id'},
                    {data: 'ticket_no', name: '{{config('fine.tickets_table')}}.ticket_no'},
                    {data: 'total_amount', name: '{{config('fine.tickets_table')}}.total_amount'},
                    {data: 'paid', name: '{{config('fine.tickets_table')}}.paid'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
