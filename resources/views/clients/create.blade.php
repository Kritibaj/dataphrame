@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
   
        
    <!-- Main content -->
    <section class="content">
       <ol class="breadcrumb breadcrumb-bg-orange">
        <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
        <li><a href="javascript:void(0);">{{ __('constants.Client_Management') }}</a></li>
        <li class="active" >{{ __('constants.Create_Client') }}</a></li>
    </ol>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!--<div class="pull-left">
            <h2>Create New Role</h2>
        </div>-->
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('clients.index') }}">{{ __('constants.Back') }}</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> {{ __('constants.errormessage') }}<br><br>
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
                      {{ __('constants.Create_Client') }}
                  </h2>
              
                </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::open(array('route' => 'clients.store','method'=>'POST')) !!}
             <div class="body">  
                <div class="form-group">
                  <label>{{ __('constants.Name') }}</label>
                    <div class="form-line">
                    {!! Form::text('name', null, array('placeholder' => __('constants.Name'),'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Email') }}</label>
                  <div class="form-line">
                  {!! Form::text('email', null, array('placeholder' => __('constants.Email'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('constants.ClientOrganization') }}</label>
                  <div class="form-line">
                  {!! Form::text('ClientOrganization', null, array('placeholder' => __('constants.ClientOrganization'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Country') }}</label>
                  <div class="form-line">
                   {!! Form::select('country', $countries,[], array('placeholder' => __('constants.Country'),'class' => 'form-control')) !!}
                   </div>
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Region') }}</label>
                  <div class="form-line">
                  {!! Form::text('region', null, array('placeholder' => __('constants.Region'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Address') }}</label>
                  <div class="form-line">
                  {!! Form::textarea('address', null, array('placeholder' => __('constants.Address'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('constants.OtherInformation') }}</label>
                  <div class="form-line">
                  {!! Form::textarea('OtherInformation', null, array('placeholder' => __('constants.OtherInformation'),'class' => 'form-control')) !!}
                  </div>
                </div>
                <div class="box-footer">
                  <div class="form-line">
                    <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->

              
            {!! Form::close() !!}
          </div>
        </div>

</section>
</div>

@endsection