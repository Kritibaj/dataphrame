@extends('layouts.common')
@section('head_style')
<link rel="stylesheet" href="{!! asset('themeold/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <ol class="breadcrumb breadcrumb-bg-orange">
          <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
          <li class="active" >{{ __('constants.Hardware_Management') }}</li>
      </ol>
<div class="row">
    <div class="col-lg-12 margin-tb">
       <!-- <div class="pull-left">
            <h2>Users Management</h2>
        </div>-->
        <div class="pull-right">
           @role('Admin')<a class="btn btn-primary" href="{{ route('users.create') }}">{{ __('constants.Create_New_User') }}</a>@endrole
        </div>
    </div>
</div>


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
                {{ __('constants.Hardware_Management') }}
            </h2>
            
        </div>
            <!-- /.box-header -->
       
 <div class="body">
           <div class="row clearfix">
              <div class="col-md-2">
                  <div class="input-group">
                      <div class="form-line">
                          <input type="text" id='searchByHardware' class="form-control date" placeholder="Enter Hardware">
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="input-group">
                      <div class="form-line">
                          <input type="text" id='searchByJobOrder' class="form-control date" placeholder="Enter Job Order Number">
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="input-group">
                      <select id='searchByDeliveryst' class="form-control show-tick">
                         <option value=''>{{ __('constants.SelectDelivery') }}</option>
                         <option value="1">{{ __('constants.Delivered') }}</option>                         
                         <option value="0">{{ __('constants.NotDelivered') }}</option>
                      </select>
                  </div>
              </div>   
              <div class="col-md-2">
                  <div class="input-group">
                      <select id='searchByConfigstatus' class="form-control show-tick">
                         <option value=''>{{ __('constants.Configuration_Status') }}</option>
                         <option value="2">{{ __('constants.Ready') }}</option>                         
                         <option value="1">{{ __('constants.InProgress') }}</option>                                              
                         <option value="0">{{ __('constants.NotReady') }}</option>
                      </select>
                  </div>
              </div> 
              <div class="col-md-2">
                  <div class="input-group">
                      <select id='searchByShippedForDeployement' class="form-control show-tick">
                         <option value=''>{{ __('constants.Shipped_Deployement') }}</option>
                         <option value="2">{{ __('constants.Ready') }}</option>                         
                         <option value="1">{{ __('constants.InProgress') }}</option>                                              
                         <option value="0">{{ __('constants.NotReady') }}</option>
                      </select>
                  </div>
              </div>             
          </div>
       
  <div class="table-responsive"> 
        <table id="hardware_id" class="table table-bordered table-striped">
                <thead>                
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.Hardware') }}</th>
                   <th>{{ __('constants.JobOrderNumber') }}</th>
                   <th>{{ __('constants.Quantity') }}</th>
                   <th>{{ __('constants.Delivery_Status') }}</th>
                   <th>{{ __('constants.Configuration_Status') }}</th>                   
                   <th>{{ __('constants.Shipped_For_Deployement') }}</th>
                   <th>{{ __('constants.Action') }}</th>
                </tr>
                </thead>
                <tbody>
              
                </tbody>
                <tfoot>
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.Hardware') }}</th>
                   <th>{{ __('constants.JobOrderNumber') }}</th>
                   <th>{{ __('constants.Quantity') }}</th>
                   <th>{{ __('constants.Delivery_Status') }}</th>
                   <th>{{ __('constants.Configuration_Status') }}</th>                   
                   <th>{{ __('constants.Shipped_For_Deployement') }}</th>
                   <th>{{ __('constants.Action') }}</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
            </div>
          </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box-body -->
        </div>
</section>
</div>
@endsection

@section('footer_js')
<script src="{!! asset('themeold/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('themeold/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
@endsection