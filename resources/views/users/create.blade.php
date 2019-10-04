@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

        
    <!-- Main content -->
    <section class="content">
      <ol class="breadcrumb breadcrumb-bg-orange">
          <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
          <li><a href="javascript:void(0);">{{ __('constants.User_Management') }}</a></li>
          <li class="active" >{{ __('constants.Create_New_User') }}</li>
      </ol>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!--<div class="pull-left">
                    <h2>Create New User</h2>
                </div> -->
                 @if(Auth::user()['roles'][0]['name'] == 'Admin')
                     @php $back = route('users.index') @endphp
                  @else
                     @php $back = route('users.grid') @endphp
                  @endif
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ $back }}">{{ __('constants.Back') }} </a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ __('constants.errormessage') }} <br><br>           
            <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
            </ul>
          </div>
        @endif

 <div class="box box-primary" >
            <div class="box-header with-border ">
              <div class="card" >
               <div class="header">
                    <h2>
                        {{ __('constants.Create_New_User') }}
                    </h2>
                    
                </div>
            <!-- /.box-header -->
            <!-- form start -->
             {!! Form::open(array('route' => 'users.store','method'=>'POST','files'=>"true")) !!}
              <div class="body">
                <div class="form-group">
                  <label> {{ __('constants.Name') }}</label>
                  <div class="form-line">
                    {!! Form::text('name', null, array('placeholder' => __('constants.Name'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Email') }}</label>
                  <div class="form-line">
                  {!! Form::text('email', null, array('placeholder' => __('constants.Email'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Dob') }}</label>
                  <div class="form-line">
                    {!! Form::date('dob', null, array('placeholder' => __('constants.Dob'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Employee_Number') }}</label>
                  <div class="form-line">
                    {!! Form::text('employee_number', null, array('placeholder' => __('constants.Employee_Number'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Department') }}</label>
                  <div class="form-line">
                    {!! Form::select('department', $departments,[], array('class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label >{{ __('constants.Role') }}</label>
                  <div class="form-line">
                  {!! Form::select('role', $roles,[], array('placeholder' => __('constants.Role'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label > {{ __('constants.Password') }}</label>
                  <div class="form-line">
                  {!! Form::password('password', array('placeholder' => __('constants.Password'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label > {{ __('constants.Confirm_Password') }}</label>
                  <div class="form-line">
                  {!! Form::password('confirm-password', array('placeholder' => __('constants.Confirm_Password'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label >{{ __('constants.Profile_Image') }}</label>
                  <div class="form-line">
                  {!! Form::file('profile_image', array('placeholder' => __('constants.Profile_Image'),'class' => 'form-control')) !!}
                  </div>
                </div>
                
                
              </div>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
              </div>
            {!! Form::close() !!}
          </div>
    <section>
</div>
@endsection