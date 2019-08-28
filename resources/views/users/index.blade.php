@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        {{ __('constants.User_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('constants.Home') }}</a></li>
        <li class="active">{{ __('constants.User_Management') }}</li>
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
            <a class="btn btn-primary" href="{{ route('users.create') }}">{{ __('constants.Create_New_User') }}</a>
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
              <h3 class="box-title">{{ __('constants.User_Management') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
         <input type='text' class="filter" id='searchByName' placeholder='Enter Name'>
         <input type='text' class="filter"id='searchByEmployeeno' placeholder='Enter Employee No'>
         <select id='searchByRole' class="filter">
           <option value=''>-- Select Role--</option>
           @foreach($roles as $role)
           <option value="{{ $role->id }}">{{ $role->name }}</option>
           @endforeach
         </select> 
         <select id='searchByDepartment' class="filter">
           <option value=''>-- Select Department--</option>
           @foreach($departments as $department)
           <option value="{{ $department->id }}">{{ $department->name }}</option>
           @endforeach
         </select> 
        
        <table id="example1" class="table table-bordered table-striped">
                <thead>                
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.Name') }}</th>
                   <th>{{ __('constants.Profile_Image') }}</th>
                   <th>{{ __('constants.Employee_Number') }}</th>
                   <th>{{ __('constants.Roles') }}</th>
                   <th>{{ __('constants.Departments') }}</th>
                   <th>{{ __('constants.Action') }}</th>
                </tr>
                </thead>
                <tbody>
              
                </tbody>
                <tfoot>
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.Name') }}</th>
                   <th>{{ __('constants.Profile_Image') }}</th>
                   <th>{{ __('constants.Employee_Number') }}</th>
                   <th>{{ __('constants.Roles') }}</th>
                   <th>{{ __('constants.Departments') }}</th>
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