@extends('layouts.common')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->   
        
    <!-- Main content -->
    <section class="content">
        <ol class="breadcrumb breadcrumb-bg-orange">
                                <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
                                <li><a href="javascript:void(0);">{{ __('constants.Task_Management') }}</a></li>
                                <li class="active" >{{ __('constants.Edit_Task') }}</a></li>
                            </ol>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!--<div class="pull-left">
                    <h2>Edit New User</h2>
                </div>-->
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('tasklists.index') }}"> {{ __('constants.Back') }}</a>
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
              
            <!-- /.box-header -->
            <div class="card" >
               <div class="header">
                    <h2>
                        {{ __('constants.Edit_Task') }}
                    </h2>
                    
                </div>
            <!-- form start -->
            {!! Form::model($tasklist, ['method' => 'PATCH','route' => ['tasklists.update', $tasklist->id],'files'=>"true"]) !!}
              <div class="body">  
                <div class="form-group">
                  <label> {{ __('constants.Name') }}</label>
                    <div class="input-group">
                      <div class="form-line">
                    {!! Form::text('name', null, array('placeholder' => __('constants.Name'),'class' => 'form-control')) !!}
                    </div>
                </div>
                </div>  
                            <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('constants.Submit') }}</button>
              </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
        </div>

    </section>
    </div>

@endsection