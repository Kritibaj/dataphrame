@extends('layouts.common')
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
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
          
       <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <div class="pull-right">
                                  <a class="btn btn-primary" href="{{ route('users.create') }}">{{ __('constants.Create_New_User') }}</a>
                              </div>  
                            <h2>
                                {{ __('constants.User_Management') }}
                            </h2> 

                        </div>
                        <div class="body">
                           <div class="row clearfix">
                              <div class="col-md-2">
                                  <div class="input-group">
                                      <div class="form-line">
                                          <input type="text" id='searchByNamegrid' class="form-control date" placeholder="Enter Name">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="input-group">
                                      <div class="form-line">
                                          <input type="text" id='searchByEmployeenogrid' class="form-control date" placeholder="Enter Employee No">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-2">
                                    <select id='searchByRolegrid' class="form-control show-tick">
                                         <option value=''>-- Select Role--</option>
                                         @foreach($roles as $role)
                                         <option value="{{ $role->id }}">{{ $role->name }}</option>
                                         @endforeach
                                    </select>
                              </div>
                              <div  class="col-md-2">
                                    <select id='searchByDepartmentgrid' class="form-control">
                                         <option value=''>-- Select Department--</option>
                                         @foreach($departments as $department)
                                         <option value="{{ $department->id }}">{{ $department->name }}</option>
                                         @endforeach
                                    </select>
                              </div>
                          </div>
                        <div class="row employeegrid">
                         <!--  @foreach($data as $data)
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <a href="profile/{{$data->id}}"> <img src="/storage/profile_image/{{ $data->profile_image }} " width="199" height="253" > </a>
                                        <div class="caption">
                                            <h3>{{ $data->name }}</h3>
                                            <p>
                                               <b>Department: </b>  
                                               @if(!empty($data->getDepartmentNames()))
                                                  @foreach($data->getDepartmentNames() as $v)
                                                     {{ $v }}
                                                  @endforeach
                                               @endif 
                                            </p>
                                            <p>
                                               <b>Role: </b>
                                               @if(!empty($data->getRoleNames()))
                                                  @foreach($data->getRoleNames() as $v)
                                                     {{ $v }}
                                                  @endforeach
                                               @endif 
                                            </p>
                                            <p>
                                                <a href="{{ route('users.edit',$data->id) }}" class="btn btn-primary waves-effect" role="button">Edit</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                          @endforeach -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
 
</section>
</div>
@endsection

