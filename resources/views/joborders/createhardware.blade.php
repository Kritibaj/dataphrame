@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 
        
    <!-- Main content -->
    <section class="content">
      <ol class="breadcrumb breadcrumb-bg-orange">
          <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
          <li><a href="javascript:void(0);">{{ __('constants.JobOrder_Management') }}</a></li>
           <li class="active" >{{ __('constants.Add_Hardware') }}</li>
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
                        {{ __('constants.Add_Hardware') }}
                    </h2>
                    
                </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(array('route' => 'joborders.hardwarestore','method'=>'POST','files'=>"true")) !!}
               <div class="body">
                <div class="row clearfix">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label> {{ __('constants.JobOrderNumber') }}</label>
                      <div class="form-line">
                      {!! Form::text('job_order_number', $job_order_number, array('placeholder' => __('constants.JobOrderNumber'), 'class' => 'form-control', 'readonly' => 'readonly' )) !!}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row clearfix">
                  <div class="col-sm-12">
                  <div class="form-group">                   
                    <label> {{ __('constants.Hardware') }}</label>
                    <div class="form-line">
                      {!! Form::select('hardware', $hardware, array('placeholder' => __('constants.Hardware'),'class' => 'form-control')) !!}
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-12">
                 <div class="form-group">
                  <label> {{ __('constants.Quantity') }}</label>
                   <div class="form-line">
                    {!! Form::select('quantity', $quantity, array('placeholder' => __('constants.Quantity'),'class' => 'form-control')) !!}
                   </div>
                </div>
              </div> 
             </div>
             <div class="row clearfix">
               <div class="col-sm-12">             
                <div class="form-group">
                  <label> {{ __('constants.Delivery_Status') }}</label>
                      <div class="switch">
                          <label><input type="checkbox" name="delivery_status"><span class="lever switch-col-green"></span></label>
                      </div>
                </div>
              </div>
              </div>
              <div class="row clearfix">
               <div class="col-sm-12">  
                <div class="form-group">
                  <label> {{ __('constants.Configuration_Status') }}</label>
                  <div>
                    <input type="checkbox" id="md_checkbox_21" name="conf_status" value="0" class="filled-in chk-col-red" checked="">
                    <label for="md_checkbox_21">Not Ready</label>
                    <input type="checkbox" id="md_checkbox_33" name="conf_status" value="1" class="filled-in chk-col-yellow" />
                    <label for="md_checkbox_33">In Progress</label>
                    <input type="checkbox" id="md_checkbox_30" name="conf_status" value="2" class="filled-in chk-col-green" />
                    <label for="md_checkbox_30">Ready</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
              <div class="col-sm-12"> 
                <div class="form-group">
                  <label> {{ __('constants.Shipped_For_Deployement') }}</label>
                  <div>
                    <input name="shipped" type="radio" id="radio_7" value="0" class="radio-col-red" checked="" />
                    <label for="radio_7">Not Shipped</label>
                    <input name="shipped" type="radio" id="radio_19" value="1"  class="radio-col-yellow" />
                    <label for="radio_19">In Progress</label>
                    <input name="shipped" type="radio" id="radio_16" value="2" class="radio-col-green" />
                    <label for="radio_16">Shipped</label>
                  </div>

                  <!-- <div class="demo-radio-button">
                        <input name="group4" type="radio" id="radio_7" class="radio-col-red" checked />
                        <label for="radio_7">RED</label>                                
                        <input name="group4" type="radio" id="radio_19" class="radio-col-yellow" />
                        <label for="radio_19">YELLOW</label>
                        <input name="group4" type="radio" id="radio_16" class="radio-col-green" />
                        <label for="radio_16">GREEN</label>
                  </div> -->
                </div>  
              </div>
            </div>
            <div class="row clearfix">
                <div class="col-sm-12">             
                <div class="form-group">
                  <label> {{ __('constants.Notes') }}</label>
                  <div class="form-line">
                    <textarea rows="1" name="notes" class="form-control no-resize auto-growth" placeholder="Notes"></textarea>
                  </div>
                </div>
                </div> 
            </div> 
            <div class="row clearfix"> 
                <div class="col-sm-12">             
                <div class="form-group">
                  <label> {{ __('constants.Publish') }}</label>
                  <div>
                    <div class="switch">
                        <label><input type="checkbox" name="publish"><span class="lever switch-col-cyan"></span></label>
                    </div>
                  </div>
                </div>
                </div>    
            </div>           
              <div> 
                <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="submit" >{{ __('constants.Submit') }}</button>               
                <button type="submit" class="btn btn-primary" name="submit" value="addmore" >{{ __('constants.Save&AddMore') }}</button>              
                <button type="submit" class="btn btn-primary" name="submit" value="cableModule" >{{ __('constants.Save&InsertCablingModule') }}</button>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            {!! Form::close() !!}
          </div>

    </section>
    </div>
@endsection

@section('footer_js')
    <script src="{!! asset('theme/plugins/autosize/autosize.js') !!}"></script>
    <script src="{!! asset('theme/plugins/momentjs/moment.js') !!}"></script>
@endsection