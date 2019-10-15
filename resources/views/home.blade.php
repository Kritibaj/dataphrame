@extends('layouts.common')
@section('head_style')
<link rel="stylesheet" href="{!! asset('themeold/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
@endsection
@section('content')

   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">OPEN JOBS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">CLOSED JOBS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">OPEN PO STATUS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">PENDING QUOTES</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
         <!--
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CPU USAGE (%)</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <div class="switch panel-switch-btn">
                                        <span class="m-r-10 font-12">REAL TIME</span>
                                        <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                                    </div>
                                </div>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="dashboard-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            -->

            <div class="row clearfix">
                <!-- Task Info -->
               <!--  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Job Orders</h2>

                        @if(Auth::user()['roles'][0]['name'] == 'Admin' || Auth::user()['roles'][0]['name'] == 'Operations' || Auth::user()['roles'][0]['name'] == 'Accounts')
                        <div class="pull-right cjob">
                            <a class="btn btn-primary" href="{{ route('joborders.create') }}">{{ __('constants.Create_New_JobOrder') }}</a>
                        </div>
                        @endif
                        </div>
                        <div class="body">
                             <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                   <th width="5%">{{ __('constants.No') }}</th>
                                   <th width="20%">{{ __('constants.JobOrderNumber') }}</th>
                                   <th width="30%">{{ __('constants.ClientPm') }}</th>
                                   <th width="40%">{{ __('constants.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>{{ __('constants.No') }}</th>
                                   <th>{{ __('constants.JobOrderNumber') }}</th>
                                   <th>{{ __('constants.ClientPm') }}</th>
                                   <th>{{ __('constants.Action') }}</th>
                                </tr>
                                </tfoot>
                             </table>
                        </div>
                    </div>
                </div> -->
                <!-- #END# Task Info -->
                <!-- Browser Usage -->

                <!-- #END# Browser Usage -->

                  <!-- #END# CPU Usage -->
            <div class="row clearfix">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                 data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                 data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                 data-fill-Color="rgba(0, 188, 212, 0)">
                                {{$graph}}
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>{{$today}}</b> <small>JOBS</small></span>
                                </li>
                                <li>
                                    THIS WEEK
                                    <span class="pull-right"><b>{{$week}}</b> <small>JOBS</small></span>
                                </li>
                                <li>
                                    THIS MONTH
                                    <span class="pull-right"><b>{{$month}}</b> <small>JOBS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Latest Social Trends -->
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body job-order-bg">
                            <div class="m-b--35 create-job-heading font-bold">CREATE JOB ORDERS</div>
                            <!-- <ul class="dashboard-stat-list create-job-orders">
                                <a href="{{ route('joborders.create') }}">
                                    <button type="button" class="btn waves-effect" id='add-jobs'>
                                        <span>Add Jobs</span>
                                    </button>
                                </a>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
               <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <!-- <div class="header">
                           <h2>Posted Job Orders</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>-->
                        <div class="body">
                            <div id="donut_chart" class="dashboard-donut-chart"></div>
                        </div>
                    </div>

                </div>
                <!-- #END# Answered Tickets -->
            </div>

            </div>
        </div>

    </section>


@endsection
@section('footer_js')
<script src="{!! asset('theme/js/pages/index.js') !!}"></script>
<script src="{!! asset('themeold/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('themeold/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
@endsection
<script>
var dat = '{!!$jobs!!}';
dat = JSON.parse(dat);
console.log(dat);
function initDonutChart() {
    Morris.Donut({
        element: 'donut_chart',
        data: dat,
        colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)'],
        formatter: function (y) {
            return y + '%'
        }
    });
}
</script>
