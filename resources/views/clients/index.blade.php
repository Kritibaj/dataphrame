@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('constants.Client_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('constants.Home') }}</a></li>
        <li class="active">{{ __('constants.Client_Management') }}</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
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


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> {{ __('constants.Client_Management') }}</h3>
            </div>
 <div class="box-body">
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
 </section>
</div>

@endsection