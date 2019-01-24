@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Motorists</span>
              <span class="info-box-number">{{ number_format(App\Models\Access\User\Motorist::count()) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Officers</span>
              <span class="info-box-number">{{ number_format(App\Models\Access\User\Officer::count()) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-ticket"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Tickets</span>
                <span class="info-box-number">{{ number_format(App\Models\Fine\Ticket::count()) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Revenue</span>
              <span class="info-box-number">Rs. {{ number_format(App\Models\Fine\Ticket::revenue(), 2, '.', ',') }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->render() !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection