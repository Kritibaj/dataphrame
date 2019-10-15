Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="">
				      @if(!empty(Auth::user()->profile_image))
						 @php $user_profile ='storage/profile_image/'.Auth::user()->profile_image; @endphp 
					  @else
						 @php $user_profile ='img/default_profile.png'; @endphp 
					  @endif
                    <img src="{{ asset($user_profile ) }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->employee_number }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                           <!-- <li><a href="{!! asset('profile/'.Auth::user()->id) !!}"><i class="material-icons">person</i>Profile</a></li>-->
                            <li role="separator" class="divider"></li>
                            <li><a class="dropdown-item btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="material-icons">input</i> 
                                        {{ __('Logout') }}
							</a></li>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu" style="background:black;">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{ route('home') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    @role('Admin')
                   <li>
                        <a href="{{ route('users.index') }}">
                            <i class="material-icons clwh">assignment_ind</i>
                            <span class="clwh" >{{  __('constants.Manage_Employees') }}</span>
                        </a>
                    </li>
                    @endrole
                    
                    @if(Auth::user()['roles'][0]['name'] == 'Operations' || Auth::user()['roles'][0]['name'] == 'Accounts')
                    <li>
                        <a href="{{ route('users.grid') }}">
                            <i class="material-icons clwh">assignment_ind</i>
                            <span class="clwh" >{{  __('constants.User_Management') }}</span>
                        </a>
                    </li>
                    @endif
                   <!--@role('Admin') 
				   <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="material-icons">layers</i>
                            <span>{{  __('constants.Manage_Role') }} </span>
                        </a>
                    </li>
					@endrole-->
				   @role('Admin') 
				   <li>
                        <a href="{{ route('clients.index') }}">
                            <i class="material-icons clwh">layers</i>
                            <span class="clwh" >{{  __('constants.Manage_Client') }} </span>
                        </a>
                    </li>
					@endrole
					@role('Admin')
				    <li>
                        <a href="{{ route('tasklists.index') }}">
                            <i class="material-icons clwh">layers</i>
                            <span class="clwh" >{{  __('constants.Manage_Task_List') }} </span>
                        </a>
                    </li>
					@endrole
				    <!--<li>
                        <a href="{{ route('joborders.index') }}">
                            <i class="material-icons">layers</i>
                            <span>{{  __('constants.Manage_JobOrder') }} </span>
                        </a>
                    </li>-->
                    @if(Auth::user()['roles'][0]['name'] == 'Tech Services')
                    <li>
                        <a href="{{ route('hardware.index') }}">
                            <i class="material-icons clwh">layers</i>
                            <span class="clwh" >{{  __('constants.Manage_Hardware') }} </span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('hardware.index') }}">
                            <i class="material-icons clwh">layers</i>
                            <span class="clwh" >{{  __('constants.Reports') }} </span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">Dataphrame</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar