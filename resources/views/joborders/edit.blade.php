@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ __('constants.JobOrder_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('constants.Home') }}</a></li>
        <li >{{ __('constants.JobOrder_Management') }}</li>        
        <li class="active">{{ __('constants.Edit_User') }}</li>
      </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!--<div class="pull-left">
                    <h2>Edit New User</h2>
                </div>-->
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('joborders.index') }}"> {{ __('constants.Back') }}</a>
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
              <h3 class="box-title">{{ __('constants.Edit_JobOrder') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($joborder, ['method' => 'PATCH','route' => ['joborders.update', $joborder->id],'files'=>"true"]) !!}
               <div class="box-body">
                <div class="form-group">
                  <label> {{ __('constants.JobOrderNumber') }}</label>
                  {!! Form::text('job_order_number', null, array('placeholder' => __('constants.JobOrderNumber'),'class' => 'form-control','readonly' => 'readonly' )) !!}
                </div>
                <div class="form-group">
                  <label> {{ __('constants.QuoteNumber') }}</label>
                    {!! Form::text('quote_number', null, array('placeholder' => __('constants.QuoteNumber'),'class' => 'form-control')) !!}
                </div>
                 <div class="form-group">
                  <label> {{ __('constants.DatOfRequest') }}</label>
                    {!! Form::date('dat_of_request', null, array('placeholder' => __('constants.DatOfRequest'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label> {{ __('constants.QuoteValue') }}</label>
                    {!! Form::text('quote_value', null, array('placeholder' => __('constants.QuoteValue'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Description') }}</label>
                    {!! Form::textarea('description', null, array('placeholder' => __('constants.Description'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label> {{ __('constants.Location') }}</label>:<br>
                  <div class="row">
                    <div class="col-md-6">
                      <label> {{ __('constants.HotelName') }}</label>
                      {!! Form::text('hotel_name', null, array('placeholder' => __('constants.HotelName'),'class' => 'form-control')) !!}
                    </div>
                     <div class="col-md-6">
                      <label> {{ __('constants.City') }}</label>
                      {!! Form::text('city', null, array('placeholder' => __('constants.City'),'class' => 'form-control')) !!}
                    </div>
                    <div class="col-md-6">
                    <label> {{ __('constants.PostCode') }}</label>
                    {!! Form::text('post_code', null, array('placeholder' => __('constants.PostCode'),'class' => 'form-control')) !!}
                    </div>
                    <div class="col-md-6">
                      <label> {{ __('constants.Address') }}</label>
                      {!! Form::textarea('address', null, array('placeholder' => __('constants.Address'),'class' => 'form-control')) !!}
                    </div>

                  </div>
                </div>
                <div class="form-group">
                  <label > {{ __('constants.HotelContact') }}</label>
                  {!! Form::text('hotel_contact', null, array('placeholder' => __('constants.HotelContact'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label > {{ __('constants.Scope') }}</label>
                   {!! Form::text('scope', null, array('placeholder' => __('constants.Scope'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label > {{ __('constants.PoNumber') }}</label>
                   {!! Form::text('po_number', null, array('placeholder' => __('constants.PoNumber'),'class' => 'form-control')) !!}
                </div> 
                <div class="form-group">
                  <label>{{ __('constants.Country') }}</label>
                  {!! Form::select('country', $countries, null , array('placeholder' => __('constants.Country'),'class' => 'form-control')) !!}
                </div> 
                <div class="form-group">
                  <label >{{ __('constants.Client_Project_Manager') }}</label>
                  {!! Form::select('client_pm', $clients, null, array('placeholder' => __('constants.Client_Project_Manager'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  <label >{{ __('constants.Service_Description') }}</label>
                  {!! Form::select('tasklist', $tasklist, null, array('placeholder' => __('constants.Service_Description'),'class' => 'form-control')) !!}
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
              </div>
            {!! Form::close() !!}
          </div>

    </section>
    </div>

@endsection