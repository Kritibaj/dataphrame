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
          <li class="active" >{{ __('constants.User_Management') }}</li>
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
                {{ __('constants.User_Management') }}
            </h2>
            
        </div>
            <!-- /.box-header -->
       
 <div class="body">
           <div class="row clearfix">
              <div class="col-md-2">
                  <div class="input-group">
                      <div class="form-line">
                          <input type="text" id='searchByName' class="form-control date" placeholder="Enter Name">
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="input-group">
                      <div class="form-line">
                          <input type="text" id='searchByEmployeeno' class="form-control date" placeholder="Enter Employee No">
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
                    <select id='searchByRole' class="form-control show-tick">
                         <option value=''>-- Select Role--</option>
                         @foreach($roles as $role)
                         <option value="{{ $role->id }}">{{ $role->name }}</option>
                         @endforeach
                    </select>
              </div>
              <div id='searchByDepartment' class="col-md-2">
                    <select class="form-control">
                         <option value=''>-- Select Department--</option>
                         @foreach($departments as $department)
                         <option value="{{ $department->id }}">{{ $department->name }}</option>
                         @endforeach
                    </select>
              </div>
          </div>
       <!--   <input type='text' class="filter"  placeholder='Enter Name'>
         <input type='text' class="filter" placeholder='Enter Employee No'>
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
         </select>  -->
  <div class="table-responsive"> 
        <table id="example1" class="table table-bordered table-striped">
                <thead>                
                <tr>
                   <th>{{ __('constants.No') }}</th>
                   <th>{{ __('constants.Name') }}</th>
                   <th>{{ __('constants.Profile_Image') }}</th>
                   <th>{{ __('constants.Employee_Number') }}</th>
                   <th>{{ __('constants.Roles') }}</th>
                   <th>{{ __('constants.Departments') }}</th>
                   @role('Admin')<th>{{ __('constants.Action') }}</th>@endrole
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
                   @role('Admin')<th>{{ __('constants.Action') }}</th>@endrole
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