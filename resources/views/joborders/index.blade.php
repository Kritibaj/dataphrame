@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        {{ __('constants.JobOrder_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('constants.Home') }}</a></li>
        <li class="active">{{ __('constants.JobOrder_Management') }}</li>
      </ol>
    </section>
		
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
       <!-- <div class="pull-left">
            <h2>Users Management</h2>
        </div>-->
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('joborders.create') }}">{{ __('constants.Create_New_JobOrder') }}</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('constants.JobOrder_Management') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        
        
        <table id="jobOrderId" class="table table-bordered table-striped">
                <thead>                
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.JobOrderNumber') }}</th>
                   <th>{{ __('constants.QuoteNumber') }}</th>
                   <th>{{ __('constants.QuoteValue') }}</th>
                   <th>{{ __('constants.Description') }}</th>
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
                   <th>{{ __('constants.QuoteValue') }}</th>
                   <th>{{ __('constants.Description') }}</th>
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
</section>
</div>
@endsection