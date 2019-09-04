 <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 DataPharama.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script src="{!! asset('theme/bower_components/jquery/dist/jquery.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{!! asset('theme/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/morris.js/morris.min.js') !!}"></script>
<!-- Sparkline -->
<!--<script src="{!! asset('theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}"></script>
<!-- jvectormap -->
<script src="{!! asset('theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! asset('theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<script src="{!! asset('theme/bower_components/jquery-knob/dist/jquery.knob.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/moment/min/moment.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
<script src="{!! asset('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script>
<script src="{!! asset('theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/fastclick/lib/fastclick.js') !!}"></script>
<script src="{!! asset('theme/dist/js/adminlte.min.js') !!}"></script>
<script src="{!! asset('theme/dist/js/pages/dashboard.js') !!}"></script>
<script src="{!! asset('theme/dist/js/demo.js') !!}"></script>
<script src="{!! asset('theme/bower_components/moment/moment.js') !!}"></script>
<script src="{!! asset('theme/bower_components/fullcalendar/dist/fullcalendar.min.js') !!}"></script>
<script src="{!! asset('theme/bower_components/ckeditor/ckeditor.js') !!}"></script>
<script>


  $(function () {
    
     CKEDITOR.replace('note')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()

/********************General employee portal***************************************/
       var dataTable = $('#example1').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',    
        //'searching': false, // Remove default Search Control
        'ajax': {
           'url':"{{ route('users.ajaxrequestUser') }}",
            'headers': {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           'data': function(data){
              // Read values
              var role = $('#searchByRole').val();
              // Append to data
              data.searchByRole = role;
               var department = $('#searchByDepartment').val();
              // Append to data
              data.searchByDepartment = department;
               var employeeno = $('#searchByEmployeeno').val();
              // Append to data
              data.searchByEmployeeno = employeeno;
               var name = $('#searchByName').val();
              // Append to data
              data.searchByName = name;

           }
        },
        'columns': [
           { data: 'id' }, 
           { data: 'name' },
           { data: 'profile_image' },
           { data: 'employee_number' },
           { data: 'roles' },
           { data: 'department' },
           { data: 'actions' },
        ]
      });

      $('#searchByRole').change(function(){
        dataTable.draw();
      });
      $('#searchByDepartment').change(function(){
        dataTable.draw();
      });
      $('#searchByEmployeeno').keyup(function(){
        dataTable.draw();
      });
      $('#searchByName').keyup(function(){
        dataTable.draw();
      });
/********************General employee portal***************************************/

/********************Client portal***************************************/

     var dataTable1 = $('#clienttable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        //'searching': false, // Remove default Search Control
        'ajax': {
           'url':"{{ route('clients.ajaxrequestClient') }}",
            'headers': {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           'data': function(data){
              // Read values
              var region = $('#searchByRegion').val();
              // Append to data
              data.searchByRegion = region;
               var country = $('#searchByCountry').val();
              // Append to data
              data.searchByCountry = country;
              var organization = $('#searchByClientOrganization').val();
              // Append to data
              data.searchByClientOrganization = organization;
               var name = $('#searchByclientName').val();
              // Append to data
              data.searchByclientName = name;

           }
        },
        'columns': [
           { data: 'id' }, 
           { data: 'name' },
           { data: 'ClientOrganization' },
           { data: 'country' },
           { data: 'region' },
           { data: 'actions' },
        ]
      });
      
      $('#clienttable_filter').hide();
      
      $('#searchByRegion').keyup(function(){
        dataTable1.draw();
      });
      $('#searchByCountry').change(function(){
        dataTable1.draw();
      });
      $('#searchByClientOrganization').keyup(function(){
        dataTable1.draw();
      });
      $('#searchByclientName').keyup(function(){
        dataTable1.draw();
      });

/********************Client portal***************************************/

/********************Tasklist portal***************************************/
       var tasklistdataTable = $('#tasklist').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',    
        //'searching': false, // Remove default Search Control
        'ajax': {
           'url':"{{ route('tasklists.ajaxrequestTasklist') }}",
            'headers': {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           'data': function(data){
              
              var tasklist = $('#searchBytasklist').val();
              // Append to data
              data.searchBytasklist = tasklist;

           }
        },
        'columns': [
           { data: 'id' }, 
           { data: 'name' },
           { data: 'actions' },
        ]
      });
     
      $('#searchBytasklist').keyup(function(){
        tasklistdataTable.draw();
      });
      
/********************Tasklist portal***************************************/   

/********************JobOrder portal***************************************/
       var dataTable = $('#jobOrderId').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',    
        //'searching': false, // Remove default Search Control
        'ajax': {
           'url':"{{ route('joborders.ajaxrequestJobOrder') }}",
            'headers': {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           'data': function(data){             

           }
        },
        'columns': [
           { data: 'id' }, 
           { data: 'job_order_number' },
           { data: 'quote_number' },
           { data: 'quote_value' },
           { data: 'description' },
           { data: 'scope' },
           { data: 'po_number' }, 
           // { data: 'notes' },          
           { data: 'client_pm' },
           { data: 'actions' },
        ]
      });

   
/********************JobOrder Portal***************************************/
$('.dataTables_filter').hide();


    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
