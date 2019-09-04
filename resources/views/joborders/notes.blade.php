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
        <li class="active">{{ __('constants.JobOrder_Management') }}</li>
        <li class="active">{{ __('constants.Notes') }}</li>
      </ol>
    </section>
		
    <!-- Main content -->
    <section class="content">
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

 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('constants.Notes') }}</h3>             
            </div>            
          
              <div class="box-body">
                <div class="form-group notes">
                  @foreach($notes as $note)
                      <div class="callout callout-info"> {!! html_entity_decode($note->note, ENT_QUOTES, 'UTF-8') !!}</div>
                  @endforeach
                  </div>
                   {!! Form::open(array('route' => 'joborders.notesstore','method'=>'POST','files'=>"true")) !!}
                <div class="form-group">
                        <div class="box box-info">
                          <div class="box-header">
                            <h3 class="box-title">
                                Add note
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                              <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                      title="Collapse">
                                <i class="fa fa-minus"></i></button>
                              <!--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                      title="Remove">
                                <i class="fa fa-times"></i></button>-->
                            </div>
                            <!-- /. tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body pad">
                                  <textarea id="note" name="note" rows="10" cols="80">
                                                         {{  __('constants.addNote') }}
                                  </textarea>
                          </div>
                        </div>


                    {!! Form::hidden('project_id', $id, array('placeholder' => __('constants.addNote'),'class' => 'form-control')) !!}
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