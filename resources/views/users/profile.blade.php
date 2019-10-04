@extends('layouts.common')
@section('head_style')
  <link rel="stylesheet" href="{!! asset('themeold/bower_components/font-awesome/css/font-awesome.min.css') !!}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{!! asset('themeold/bower_components/Ionicons/css/ionicons.min.css') !!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! asset('themeold/dist/css/AdminLTE.min.css') !!}">
<style>
.content-mg{margin: 100px 15px 0 60px !important;}
.txt-content{min-height: auto !important;padding: 0 !important;}
.breadcrumb-mg{margin: 0px 15px 21px 15px !IMPORTANT;}
</style>

@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content content-mg">
      <ol class="breadcrumb breadcrumb-bg-orange breadcrumb-mg">
          <li><a href="javascript:void(0);">{{ __('constants.Home') }}</a></li>
          <li class="active" >{{ __('constants.User_Management') }}</li>
          <li class="active" >{{ __('constants.Profile') }}</li>
      </ol>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="/Dataphrame/public/storage/profile_image/{{ $user->profile_image }}" alt="AdminBSB - Profile Image" />
                            </div>
                            <div class="content-area">
                                <h3>{{ $user->name }}</h3>
                                <p>@if(!empty($user->getDepartmentNames()))
                                                  @foreach($user->getDepartmentNames() as $v)
                                                     {{ $v }}
                                                  @endforeach
                                               @endif </p>
                                <p>
                                   {{ $user->employee_number }}
                                </p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Current Projects</span>
                                    <span>Project name</span>
                                </li>
                                <li>
                                    <span>Project Completed</span>
                                    <span>4</span>
                                </li>
                                <li>
                                    <span>Pending Tasks</span>
                                    <span>10</span>
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
                        </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Company 
                                    </div>
                                    <div class="content txt-content">
                                        Company Name
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Location
                                    </div> 
                                    <div class="content txt-content">
                                        Malibu, California
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Skillset
                                    </div>
                                    <div class="content txt-content">
                                        <span class="label bg-red">UI Design</span>
                                        <span class="label bg-teal">JavaScript</span>
                                        <span class="label bg-blue">PHP</span>
                                        <span class="label bg-amber">Node.js</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content txt-content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tasks Assigned</a></li>
                                   <!-- <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>-->
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                             <div class="row">
                                                  <div class="col-md-12">
                                                    <!-- The time line -->
                                                    <ul class="timeline">
                                                      <li class="time-label">
                                                            <span class="bg-green">
                                                             Completed Task
                                                            </span>
                                                      </li>
                                                      <!-- /.timeline-label -->
                                                      <!-- timeline item -->
                                                      <li>
                                                        <i class="fa fa-hourglass-end bg-green"></i>

                                                         <div class="timeline-item">
                                                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                          <h3 class="timeline-header"><a href="#">Operation</a> assign you following task</h3>

                                                          <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                          </div>
                                                          <div class="timeline-footer">
                                                            <a class="btn btn-success btn-flat btn-xs">View Complete Task</a>
                                                          </div>
                                                        </div>
                                                      </li>
                                                      <!-- END timeline item -->
                                                      <!-- timeline item -->
                                                      <li>
                                                        <i class="fa fa-hourglass-end bg-green"></i>

                                                         <div class="timeline-item">
                                                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                          <h3 class="timeline-header"><a href="#">Operation</a> assign you following task</h3>

                                                          <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                          </div>
                                                          <div class="timeline-footer">
                                                            <a class="btn btn-success btn-flat btn-xs">View Complete Task</a>
                                                          </div>
                                                        </div>
                                                      </li>
                                                      <!-- END timeline item -->
                                                     
                                                      <!-- timeline time label -->
                                                      <li class="time-label">
                                                            <span class="bg-orange">
                                                              Pending Task
                                                            </span>
                                                      </li>
                                                      <!-- /.timeline-label -->
                                                      <!-- timeline item -->
                                                      <li>
                                                        <i class="fa fa-hourglass-half bg-orange"></i>
                                                      <div class="timeline-item">
                                                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                          <h3 class="timeline-header"><a href="#">Operation</a> assign you following task</h3>

                                                          <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                          </div>
                                                          <div class="timeline-footer">
                                                            <a class="btn btn-warning btn-flat btn-xs">View Complete Task</a>
                                                          </div>
                                                        </div>
                                                      </li>
                                                      <!-- END timeline item -->
                                                      <!-- timeline item -->
                                                      <li>
                                                        <i class="fa fa-hourglass-half bg-orange"></i>

                                                         <div class="timeline-item">
                                                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                          <h3 class="timeline-header"><a href="#">Operation</a> assign you following task</h3>

                                                          <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                          </div>
                                                          <div class="timeline-footer">
                                                            <a class="btn btn-warning btn-flat btn-xs">View Complete Task</a>
                                                          </div>
                                                        </div>
                                                      </li>
                                                      <!-- END timeline item -->
                                                      <!-- timeline item -->
                                                      <li>
                                                        <i class="fa fa-hourglass-half bg-orange"></i>

                                                        <div class="timeline-item">
                                                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                          <h3 class="timeline-header"><a href="#">Operation</a> assign you following task</h3>

                                                          <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                          </div>
                                                          <div class="timeline-footer">
                                                            <a class="btn btn-warning btn-flat btn-xs">View Complete Task</a>
                                                          </div>
                                                        </div>
                                                      </li>

                                                      <li class="time-label">
                                                            <span class="bg-red">
                                                              Task on Hold
                                                            </span>
                                                      </li>
                                                      <!-- /.timeline-label -->
                                                      <!-- timeline item -->
                                                      <li>
                                                        <i class="fa fa-hourglass-o bg-red"></i>

                                                         <div class="timeline-item">
                                                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                          <h3 class="timeline-header"><a href="#">Operation</a> assign you following task</h3>

                                                          <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                          </div>
                                                          <div class="timeline-footer">
                                                            <a class="btn btn-danger btn-flat btn-xs">View Complete Task</a>
                                                          </div>
                                                        </div>
                                                      </li>
                                                      <!-- END timeline item -->
                                                      <!-- timeline item -->
                                                      <li>
                                                        <i class="fa fa-hourglass-o bg-red"></i>

                                                         <div class="timeline-item">
                                                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                          <h3 class="timeline-header"><a href="#">Operation</a> assign you following task</h3>

                                                          <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                          </div>
                                                          <div class="timeline-footer">
                                                            <a class="btn btn-danger btn-flat btn-xs">View Complete Task</a>
                                                          </div>
                                                        </div>
                                                      </li>
                                                      <!-- END timeline item -->
                                                      <!-- timeline item -->
                                                      <li>
                                                        <i class="fa fa-hourglass-o bg-red"></i>

                                                        <div class="timeline-item">
                                                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                          <h3 class="timeline-header"><a href="#">Operation</a> assign you following task</h3>

                                                          <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                          </div>
                                                          <div class="timeline-footer">
                                                            <a class="btn btn-danger btn-flat btn-xs">View Complete Task</a>
                                                          </div>
                                                        </div>
                                                      </li>
                                                       <li>
                                                        <i class="fa fa-clock-o bg-gray"></i>
                                                      </li>
                                                      <!-- END timeline item -->
                                                      <!-- timeline time label -->
                                                      
                                                    </ul>
                                                  </div>
        <!-- /.col -->
      </div>
                                    </div>
                                 
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection