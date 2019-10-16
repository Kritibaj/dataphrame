 <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
  <input type="hidden" name="user_id" id="user_id" value="" >
  <input type="hidden" name="role" id="role" value="" >
  <input type="hidden" name="joborderNumber" id="joborder_id" value="" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Need a Permission</h4>
                        </div>
                        <div class="modal-body">
                           If you want to delete this job you have to ask Admin. Do you want to send a request to delete this job to Admin?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" id="model-yes">Yes</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>

 <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog">
  <input type="hidden" name="job_order_number" id="joborder_number" value="" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Give Permission</h4>
                        </div>
                        <div class="modal-body">
                           <p><b>User-name:</b> <span id="uname"></span></p>
                           <p><b>Role:</b> <span id="rolename"></span></p>
                           Above user wants to delete job <a href="#" id="job_order_number"></a>. Do you want to delete job?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" id="model-yesapprove">Yes</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>

 <div class="modal fade" id="postforexcution" tabindex="-1" role="dialog">
    <input type="hidden" name="joborderNumber" id="joborder_id" value="" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Post for execution</h4>
                        </div>
                        <div class="modal-body">
                           Do you want this job post for execution?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" id="postforexcution-approve">Yes</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Jquery Core Js -->
    <script src="{!! asset('theme/plugins/jquery/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{!! asset('theme/plugins/bootstrap/js/bootstrap.js') !!}"></script>

    <!-- Select Plugin Js -->
    <script src="{!! asset('theme/plugins/bootstrap-select/js/bootstrap-select.js') !!}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{!! asset('theme/plugins/jquery-slimscroll/jquery.slimscroll.js') !!}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{!! asset('theme/plugins/node-waves/waves.js') !!}"></script>

    <!-- Jquery DataTable Plugin Js -->
    @yield('footer_js')
    <script src="{!! asset('theme/plugins/jquery-countto/jquery.countTo.js') !!}"></script>
    <script src="{!! asset('theme/plugins/raphael/raphael.min.js') !!}"></script>
    <script src="{!! asset('theme/plugins/morrisjs/morris.js') !!}"></script>
    <script src="{!! asset('theme/plugins/chartjs/Chart.bundle.js') !!}"></script>
    <script src="{!! asset('theme/plugins/flot-charts/jquery.flot.js') !!}"></script>
    <script src="{!! asset('theme/plugins/flot-charts/jquery.flot.resize.js') !!}"></script>
    <script src="{!! asset('theme/plugins/flot-charts/jquery.flot.pie.js') !!}"></script>
    <script src="{!! asset('theme/plugins/flot-charts/jquery.flot.categories.js') !!}"></script>
    <script src="{!! asset('theme/plugins/flot-charts/jquery.flot.time.js') !!}"></script>
    <script src="{!! asset('theme/plugins/jquery-sparkline/jquery.sparkline.js') !!}"></script>
    <!-- Custom Js -->
    <script src="{!! asset('theme/js/admin.js') !!}"></script>
    <script src="{!! asset('theme/js/pages/ui/modals.js') !!}"></script>
    <!-- Demo Js -->
    <script src="{!! asset('theme/js/demo.js') !!}"></script>
	
<script>	
	
$(function () { 
$("input:checkbox").on('click', function() {
  var $box = $(this); 
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});

$('.list a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
    $('.nav a').click(function(){
      $(this).parent().addClass('active').siblings().removeClass('active')  
    })

showemployeeIngrid();
    $('#searchByNamegrid').keyup(function(){
          showemployeeIngrid();
        });
    $('#searchByEmployeenogrid').keyup(function(){
          showemployeeIngrid();
        });
   $('#searchByRolegrid').change(function(){
        showemployeeIngrid();
      });
   $('#searchByDepartmentgrid').change(function(){
        showemployeeIngrid();
      });

function showemployeeIngrid(url, callback){
      $.ajax({url: "showemployeegrid",
           data:{name:$("#searchByNamegrid").val(), empno:$("#searchByEmployeenogrid").val(), roleid:$("#searchByRolegrid").val(), departmentid:$("#searchByDepartmentgrid").val() },
           headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
           success: function(result){ 
            $('.employeegrid').html(result);
        }});
}    



$('.alert-success').delay(1000).fadeOut(4000);
function showNotofication(){
     $.ajax({url: "shownotification",
       data:{crole:$('#currentrole').val()},
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
       success: function(result){
        var res = JSON.stringify(result);
        $("#bell").html((res).html);
        $cout = ($("#bell_count").html() === "")?0:$("#bell_count").html();
        var count = parseInt($cout) + parseInt(JSON.stringify(result).count);
        if(parseInt(JSON.stringify(result).new) === 0){
           $("#bell_count").css("background-color","green");
         }       
        $("#bell_count").html(parseInt(JSON.stringify(result).count));
             setTimeout(function () {
                          showNotofication();
                       }, 2000);

                  }
    });
}

$("#bell_icon").on("click", function(){  

    $.ajax({url: "notificationstatus",data: {"status": 1},
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
       success: function(result){
            $("#bell_count").css("background-color","black");
      }
    });


 });
showNotofication();

$("body").on("click",".deletejob",function(){ 
  $("#user_id").val($(this).attr("data-id"));
  $("#joborder_id").val($(this).attr("data-job_order_number"));
  $("#role").val($(this).attr("data-role"));
})

$("body").on("click",".jobnotification",function(){
  $("#uname").html($(this).attr("data-uname"));
  $("#rolename").html($(this).attr("data-role"));
  $("#job_order_number").html($(this).attr("data-job_order_number"));
  $("#joborder_number").val($(this).attr("data-job_order_number"));
    var href = '/joborders/';
    href+= $(this).attr("data-id");
    href+= '/edit';
    $("#job_order_number").attr('href',href);
})


$("body").on("click","#model-yes",function(){
    var user_id = $("#user_id").val();
    var joborder_id = $("#joborder_id").val();
    var role = $("#role").val();
     $.ajax({url: "insertnotification",
         data: {user_id:user_id,role:role,joborder_id:joborder_id},
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         success: function(result){
          $('#defaultModal').modal('toggle');
          $(".page-loader-wrapper").show();
           setTimeout(function () {
              $('.page-loader-wrapper').hide();
           }, 200);
           
             jobOrder.draw();
        }});
})

$("body").on("click","#model-yesapprove",function(){
     $.ajax({url: "notificationread",
         data: {"job_order_number": $("#joborder_number").val(),"status":2},
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         success: function(result){      

          //$(".alert-success").html("JobOrders deleted successfully").show().delay(1000).fadeOut(4000);    
          window.location.href = "joborders";
       }});
})
$("body").on("click","#postforexcution-approve",function(){
     $.ajax({url: "postforexcution",
         data: {"job_order_number": $("#joborder_id").val() },
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         success: function(result){      
          window.location.href = "joborders";
       }});
})

$('#defaultModal').on('hidden.bs.modal', function () {
    $("#user_id").val("");
});
    
    
/********************General employee portal***************************************/
var coloumns = [
           { data: 'id' }, 
           { data: 'name' },
           { data: 'profile_image' },
           { data: 'employee_number' },
           { data: 'roles' },
           { data: 'department' },
        ];

        if($('#currentrole').val() == "Admin"){
          coloumns.push({ data: 'actions' });
        }
        if($('#example1').length){
       var employeedatatable = $('#example1').DataTable({
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

              var crole = $('#currentrole').val();
              data.currentrole = crole; 
           }
        },
        'columns': coloumns
      });
      }

	    $('#searchByRole').change(function(){
          employeedatatable.draw();
        });
        $('#searchByDepartment').change(function(){
          employeedatatable.draw();
        });
        $('#searchByEmployeeno').keyup(function(){
          employeedatatable.draw();
        });
        $('#searchByName').keyup(function(){
          employeedatatable.draw();
        });
 
/********************General employee portal***************************************/


/********************Hardware portal***************************************/
var hardwarecoloumns = [
           { data: 'id' }, 
           { data: 'hardware' },
           { data: 'job_order_number' },
           { data: 'quantity' },
           { data: 'delivery_status' },
           { data: 'configuration_status' },
           { data: 'shipped_for_deployement' },
           { data: 'action' }, 
        ];
        
      if($('#hardware_id').length){
         var hardwaretable = $('#hardware_id').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',    
          //'searching': false, // Remove default Search Control
          'ajax': {
             'url':"{{ route('hardware.ajaxrequestHardware') }}",
              'headers': {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
             'data': function(data){
              var hardware = $('#searchByHardware').val();
              data.searchByHardware = hardware;

              var jobOrder = $('#searchByJobOrder').val();
              data.searchByJobOrder = jobOrder;

               var deliveryst = $('#searchByDeliveryst').val();
              data.searchByDeliveryst = deliveryst;

               var configst = $('#searchByConfigstatus').val();
              data.searchByConfigstatus = configst;

              var shipped_for_deployement = $('#searchByShippedForDeployement').val();
              data.searchByShippedForDeployement = shipped_for_deployement;
             }
          },
          'columns': hardwarecoloumns
        });
      }

   $('#searchByHardware').keyup(function(){
        hardwaretable.draw();
      });
   $('#searchByJobOrder').keyup(function(){
        hardwaretable.draw();
      });
   $('#searchByDeliveryst').change(function(){
        hardwaretable.draw();
      });
   $('#searchByConfigstatus').change(function(){
        hardwaretable.draw();
      });
   $('#searchByShippedForDeployement').change(function(){
        hardwaretable.draw();
      });

/********************Hardware portal***************************************/


/********************Client portal***************************************/

   if($('#clienttable').length){
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
    }

/********************Client portal***************************************/

/********************Tasklist portal***************************************/
  if($('#tasklist').length){
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
    }
      
/********************Tasklist portal***************************************/   

/********************JobOrder portal***************************************/
if($('#jobOrderId').length){ 
       var jobOrder = $('#jobOrderId').DataTable({
        "bLengthChange" : false, //thought this line could hide the LengthMenu
        "bInfo":false,    
        "pageLength": 8,
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

              var crole = $('#currentrole').val();
              data.currentrole = crole; 
           }
        },
        'columns': [
           { data: 'id' }, 
           { data: 'job_order_number' },
           { data: 'quote_number' },
           { data: 'scope' },
           { data: 'po_number' },
           { data: 'client_pm' },
           { data: 'actions' },
        ]
      });
}   
/********************JobOrder Portal***************************************/

$('.dataTables_filter').hide();
  });
  
  </script>