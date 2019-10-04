@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->		
    <!-- Main content -->
    <section class="content">
         <ol class="breadcrumb breadcrumb-bg-orange">
            <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
            <li class="active" >{{ __('constants.JobOrder_Management') }}</li>
         </ol>
    <div class="row">
        <div class="col-lg-12 margin-tb">
           <!-- <div class="pull-left">
                <h2>Users Management</h2>
            </div>-->

            @if(Auth::user()['roles'][0]['name'] == 'Admin' || Auth::user()['roles'][0]['name'] == 'Operations' || Auth::user()['roles'][0]['name'] == 'Accounts')
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('joborders.create') }}">{{ __('constants.Create_New_JobOrder') }}</a>
            </div>
            @endif
        </div>
    </div>


<!-- @if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
{{ Session::forget('success') }}
@endif -->

@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
    </div>
@endif

 <div class="box box-primary">
            <div class="box-header with-border">
            <div class="card" >
               <div class="header">
                    <h2>
                        {{ __('constants.JobOrder_Management') }}
                    </h2>                    
                </div>
            <!-- /.box-header -->
    <div class="body">
        
        
        <table id="jobOrderId" class="table table-bordered table-striped">
                <thead>                
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.JobOrderNumber') }}</th>
                   <th>{{ __('constants.QuoteNumber') }}</th>
                   <th>{{ __('constants.Scope') }}</th>
                   <th>{{ __('constants.PoNumber') }}</th>
              <!--      <th>{{ __('constants.Notes') }}</th> -->
                   <th>{{ __('constants.ClientPm') }}</th>
                   <th>{{ __('constants.Action') }}</th>
                </tr>
                </thead>
                <tbody>
              
                </tbody>
                <tfoot>
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.JobOrderNumber') }}</th>
                   <th>{{ __('constants.QuoteNumber') }}</th>
                   <th>{{ __('constants.Scope') }}</th>
                   <th>{{ __('constants.PoNumber') }}</th>
                   <!-- <th>{{ __('constants.Notes') }}</th> -->
                   <th>{{ __('constants.ClientPm') }}</th>
                   <th>{{ __('constants.Action') }}</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
           </div>
          </div>
</section>
</div>
@endsection

@section('footer_js')
<script src="{!! asset('themeold/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('themeold/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
@endsection