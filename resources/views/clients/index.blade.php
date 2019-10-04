@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        
    <!-- Main content -->
 <section class="content">
    <ol class="breadcrumb breadcrumb-bg-orange">
        <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
        <li class="active" >{{ __('constants.Client_Management') }}</li>
    </ol>
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <!--<div class="pull-left">
              <h2>Role Management</h2>
          </div>-->
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('clients.create') }}"> {{ __('constants.Create_New_Client') }}</a>
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
                {{ __('constants.Client_Management') }}
            </h2>
            
        </div>
<div class="body">  
         <input type='text' class="filter" id='searchByclientName' placeholder='Enter Name'>
         <input type='text' class="filter" id='searchByClientOrganization' placeholder='Enter ClientOrganization'> 
         <select id='searchByCountry' class="filter">
           <option value=''>-- Select Country--</option>
           @foreach($countries as $country)
           <option value="{{ $country->id }}">{{ $country->name }}</option>
           @endforeach
         </select> 
          <input type='text' id='searchByRegion' class="filter" placeholder='Enter Region'> 
         
<table id="clienttable" class="table table-bordered table-striped">
  <thead>                
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.Name') }}</th>
                   <th>{{ __('constants.ClientOrganization') }}</th>
                   <th>{{ __('constants.Country') }}</th>
                   <th>{{ __('constants.Region') }}</th>
                   <th>{{ __('constants.Action') }}</th>
                </tr>
                </thead>
                <tbody>
              
                </tbody>
                <tfoot>
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.Name') }}</th>
                   <th>{{ __('constants.ClientOrganization') }}</th>
                   <th>{{ __('constants.Country') }}</th>
                   <th>{{ __('constants.Region') }}</th>
                   <th>{{ __('constants.Action') }}</th>
                </tr>
                </tfoot>
   
</table>
</div>
</div>
</div>
 </section>
</div>

@endsection

@section('footer_js')
<script src="{!! asset('themeold/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('themeold/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
@endsection