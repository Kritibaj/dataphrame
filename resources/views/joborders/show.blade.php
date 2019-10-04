@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 
        
    <!-- Main content -->
    <section class="content">
      <ol class="breadcrumb breadcrumb-bg-orange">
          <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
          <li><a href="javascript:void(0);">{{ __('constants.JobOrder_Management') }}</a></li>
           <li class="active" >{{ __('constants.View_JobOrder') }}</li>
       </ol>
        <div class="row clearfix">
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
            <div class="card" >
               <div class="header">
                    <h2>
                        {{ __('constants.View_JobOrder') }}
                    </h2>
                    
                </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($joborder, ['method' => 'PATCH','route' => ['joborders.update', $joborder->id],'files'=>"true"]) !!}
               <div class="body">
                <div class="row clearfix">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label> {{ __('constants.JobOrderNumber') }}</label>
                      <div class="form-line">
                      {!! Form::text('job_order_number', null, array('placeholder' => __('constants.JobOrderNumber'),'class' => 'form-control','disabled' => 'disabled' )) !!}
                      </div>
                    </div>
                  </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label> {{ __('constants.QuoteNumber') }}</label>
                    <div class="form-line">
                      {!! Form::text('quote_number', null, array('placeholder' => __('constants.QuoteNumber'),'class' => 'form-control','disabled' => 'disabled')) !!}
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                 <div class="form-group">
                  <label> {{ __('constants.DatOfRequest') }}</label>
                   <div class="form-line">
                    {!! Form::date('dat_of_request', null, array('placeholder' => __('constants.DatOfRequest'),'class' => 'form-control','disabled' => 'disabled')) !!}
                   </div>
                </div>
              </div>
              @if(Auth::user()['roles'][0]['name'] == 'Admin' || Auth::user()['roles'][0]['name'] == 'Operations' || Auth::user()['roles'][0]['name'] == 'Accounts') 
               <div class="col-sm-3">             
                <div class="form-group">
                  <label> {{ __('constants.QuoteValue') }}</label>
                  <div class="form-line">
                    {!! Form::text('quote_value', null, array('placeholder' => __('constants.QuoteValue'),'class' => 'form-control','disabled' => 'disabled')) !!}
                  </div>
                </div>
              </div>
              @endif
              </div>
                <div class="form-group">
                  <label> {{ __('constants.Description') }}</label>
                  <div class="form-line">
                    {!! Form::text('description', null, array('placeholder' => __('constants.Description'),'class' => 'form-control','disabled' => 'disabled')) !!}
                  </div>
                </div>
                 <div class="row clearfix">
                   <div class="col-md-4">
                      <label> {{ __('constants.Location') }}</label>:
                   </div>
                </div>
                <div class="row clearfix">
                  <div class="form-group">                  
                    <div class="col-md-4">
                      <label> {{ __('constants.HotelName') }}</label>
                      <div class="form-line">
                      {!! Form::text('hotel_name', null, array('placeholder' => __('constants.HotelName'),'class' => 'form-control','disabled' => 'disabled')) !!}
                      </div>
                    </div>
                     <div class="col-md-4">
                      <label> {{ __('constants.City') }}</label>
                      <div class="form-line">
                      {!! Form::text('city', null, array('placeholder' => __('constants.City'),'class' => 'form-control','disabled' => 'disabled')) !!}
                      </div>
                    </div>
                    <div class="col-md-4">
                    <label> {{ __('constants.PostCode') }}</label>
                      <div class="form-line">
                      {!! Form::text('post_code', null, array('placeholder' => __('constants.PostCode'),'class' => 'form-control','disabled' => 'disabled')) !!}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row clearfix">
                  <div class="col-md-12">
                  <div class="form-group">                    
                      <label> {{ __('constants.Address') }}</label>
                      <div class="form-line">
                      {!! Form::text('address', null, array('placeholder' => __('constants.Address'),'class' => 'form-control','disabled' => 'disabled')) !!}
                       </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-3">
                <div class="form-group">
                  <label > {{ __('constants.HotelContact') }}</label>
                  <div class="form-line">
                  {!! Form::text('hotel_contact', null, array('placeholder' => __('constants.HotelContact'),'class' => 'form-control','disabled' => 'disabled')) !!}
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label > {{ __('constants.Scope') }}</label>
                  <div class="form-line">
                   {!! Form::text('scope', null, array('placeholder' => __('constants.Scope'),'class' => 'form-control','disabled' => 'disabled')) !!}
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label > {{ __('constants.PoNumber') }}</label>
                    <div class="form-line">
                   {!! Form::text('po_number', null, array('placeholder' => __('constants.PoNumber'),'class' => 'form-control','disabled' => 'disabled')) !!}
                    </div>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('constants.Country') }}</label>
                  <div class="form-line">
                  {!! Form::select('country', $countries, null , array('placeholder' => __('constants.Country'),'class' => 'form-control','disabled' => 'disabled')) !!}
                  </div>
                </div> 
              </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-3">
                  <div class="form-group" disabled>
                    <label >{{ __('constants.Client_Project_Manager') }}</label>
                    <div class="form-line">
                    {!! Form::select('client_pm', $clients, null, array('placeholder' => __('constants.Client_Project_Manager'),'class' => 'form-control','disabled' => 'disabled')) !!}
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group" disabled>
                    <label >{{ __('constants.Service_Description') }}</label>
                    <div class="form-line">
                    {!! Form::select('task_id', $tasklist, null, array('placeholder' => __('constants.Service_Description'),'class' => 'form-control','disabled' => 'disabled')) !!}
                  </div>            
                  </div>
                </div>
                @if(Auth::user()['roles'][0]['name'] == 'Admin' || Auth::user()['roles'][0]['name'] == 'Operations' || Auth::user()['roles'][0]['name'] == 'Accounts')              
                <div class="col-md-3">
                <div class="form-group">
                  <label >{{ __('constants.Invoiced_Status') }}</label>
                  <div class="form-line">
                  {!! Form::select('invoice_status',  array("1" => "INVOICED FULL","2" => "INVOICED 50% UPFRONT","3" => "INVOICED 50% BALANCE"), null, array('placeholder' => __('constants.Invoiced_Status'),'class' => 'form-control','disabled' => 'disabled')) !!}
                  </div>                
                </div>
                </div>
                 @endif
              </div>
            </div>
              <!-- /.box-body -->

              
            </div>
            {!! Form::close() !!}
          </div>

    </section>
    </div>

@endsection