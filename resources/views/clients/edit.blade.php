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
        <li >{{ __('constants.Client_Management') }}</li>
        <li class="active">{{ __('constants.Edit_Client') }} </li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!--<div class="pull-left">
            <h2>Edit Role</h2>
        </div>-->
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('clients.index') }}"> {{ __('constants.Back') }}</a>
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
              <h3 class="box-title">{{ __('constants.Edit_Client') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           {!! Form::model($client, ['method' => 'PATCH','route' => ['clients.update', $client->id]]) !!}
              <div class="box-body">
               <div class="form-group">
                  <label>{{ __('constants.Name') }}</label>
                  {!! Form::text('name', null, array('placeholder' => __('constants.Name'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Email') }}</label>
                  {!! Form::text('email', null, array('placeholder' => __('constants.Email'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.ClientOrganization') }}</label>
                  {!! Form::text('ClientOrganization', null, array('placeholder' => __('constants.ClientOrganization'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Country') }}</label>
                  {!! Form::select('country', $countries, null , array('placeholder' => __('constants.Country'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Region') }}</label>
                  {!! Form::text('region', null, array('placeholder' => __('constants.Region'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.Address') }}</label>
                  {!! Form::textarea('address', null, array('placeholder' => __('constants.Address'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label>{{ __('constants.OtherInformation') }}</label>
                  {!! Form::textarea('OtherInformation', null, array('placeholder' => __('constants.OtherInformation'),'class' => 'form-control')) !!}
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
              </div>
          {!! Form::close() !!}
          </div>



{!! Form::close() !!}
</section>
</div>

@endsection