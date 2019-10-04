@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!--<div class="pull-left">
                    <h2>Edit New User</h2>
                </div>-->
                <div class="pull-left">
                  @if(Auth::user()['roles'][0]['name'] == 'Admin')
                     @php $back = route('users.index') @endphp
                  @else
                     @php $back = route('users.grid') @endphp
                  @endif
                    <a class="btn btn-primary" href="{{ $back }}"> {{ __('constants.Back') }}</a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong>{{ __('constants.errormessage') }}<br><br>
            <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
            </ul>
          </div>
        @endif
        <div class="box box-primary">
            <div class="box-header with-border">
              <div class="card" >
               <div class="header">
                    <h2>
                        {{ __('constants.Edit_User') }}
                    </h2>
                    
                </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id],'files'=>"true"]) !!}
              <div class="body">
                <div class="form-group">
                  <label for="exampleInputEmail1">{{ __('constants.Name') }}</label>
                  <div class="form-line">
                  {!! Form::text('name', null, array('placeholder' => __('constants.Name'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">{{ __('constants.Email') }}</label>
                  <div class="form-line">
                  {!! Form::text('email', null, array('placeholder' =>  __('constants.Email') ,'class' => 'form-control')) !!}
                 </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{ __('constants.Password') }}</label>
                  <div class="form-line">
                  {!! Form::password('password', array('placeholder' =>  __('constants.Password') ,'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{ __('constants.Confirm_Password') }}</label>
                  <div class="form-line">
                  {!! Form::password('confirm-password', array('placeholder' =>  __('constants.Confirm_Password') ,'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label >Profile Image:</label>
                  {!! Form::file('profile_image', null, array('class' => 'form-control' )) !!}
                  @if($user->profile_image)
                  <img src="{!! asset('/storage/profile_image/'.$user->profile_image) !!}"  width='100px' heigth='100px' class="" />
                  @endif
                </div>
                 <div class="form-group">
                  <label>{{ __('constants.Dob') }}</label>
                  <div class="form-line">
                    {!! Form::date('dob', null, array('placeholder' =>  __('constants.Dob') ,'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Employee_Number') }}</label>
                  <div class="form-line">
                    {!! Form::text('employee_number', null, array('placeholder' => __('constants.Employee_Number'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Department') }}</label>
                  <div class="form-line">
                    {!! Form::select('department', $departments,$selectedDepartments, array('class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">{{ __('constants.Role') }}</label>
                  <div class="form-line">
                  {!! Form::select('role', $roles,$userRole, array('class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
              </div>
              </div>
              </div>
              <!-- /.box-body -->

              
            {!! Form::close() !!}
          </div>
<!--
        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!} -->
    </section>
    </div>

@endsection