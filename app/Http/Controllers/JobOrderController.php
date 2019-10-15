<?php

namespace BPMS\Http\Controllers;

use Illuminate\Http\Request;
use BPMS\JobOrder;
use BPMS\Country;
use BPMS\Client;
use BPMS\Tasklist;
use BPMS\Note;
use BPMS\User;
use BPMS\Notification;
use BPMS\Hardware;
use Auth;
use Session;


class JobOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobOrders = JobOrder::all();
        return view('joborders.index',compact('JobOrders'));
    }

    public function ajaxrequestJobOrder(Request $request){
       
        if(Auth::user()['roles'][0]['name'] == 'Admin' || Auth::user()['roles'][0]['name'] == 'Operations' || Auth::user()['roles'][0]['name'] == 'Accounts'){
            
            $jobOrderQuery = JobOrder::select('*','job_orders.id as JobOrderId')->leftJoin('clients',"clients.id","=","job_orders.client_pm");
        }else{

            $jobOrderQuery = JobOrder::select('*','job_orders.id as JobOrderId')->leftJoin('clients',"clients.id","=","job_orders.client_pm")->where("status",'!=' ,0);
        }
        // if(isset($request->searchByRole) && !empty($request->searchByRole)){
        //     $usersQuery->where('model_has_roles.role_id',$request->searchByRole);
        // }
        // if(isset($request->searchByDepartment) && !empty($request->searchByDepartment)){
        //     $usersQuery->where('user_has_departments.department_id',$request->searchByDepartment);
        // }
        // if(isset($request->searchByEmployeeno) && !empty($request->searchByEmployeeno)){
        //     $usersQuery->where('users.employee_number','like', '%' .$request->searchByEmployeeno. '%');
        // }
        // if(isset($request->searchByName) && !empty($request->searchByName)){
        //     $usersQuery->where('users.name','like', '%' .$request->searchByName. '%');
        // } 
        // $count = $usersQuery->count();
        // $start = $request->start;
        // $operator = "plus";
        // $columnIndex = $request->order[0]['column']; 
        // $columnSortOrder = $request->order[0]['dir'];
        // $coloumnName = $request->columns[$columnIndex]['data'];
        // if($coloumnName == 'roles'){
        //     $coloumnName = "roles.name";
        // }
        // if($coloumnName == 'department'){
        //     $coloumnName = "departments.name";
        // }        
        // if($coloumnName == 'id' || $coloumnName == 'actions'){
        //     $coloumnName = "userId";
        //     if($columnSortOrder == 'desc'){
        //         $operator = "minus";
        //         $start = $count-($request->start);
        //     }
        // }
        // if($coloumnName == 'name'){
        //     $coloumnName = "userName";
        // }

        $count = $jobOrderQuery->count(); 
        $datas = $jobOrderQuery->offset($request->start)
                ->limit($request->length)->get();  

        $result_data = array();
        $current_user_id = Auth::user()->id;
        foreach($datas as $data){ 
            $delete = \Form::open(['method' => 'DELETE','route' => ['joborders.destroy', $data->JobOrderId],'style'=>'display:inline']);
            $delete.= \Form::submit('Delete', ['class' => 'btn btn-danger']);
            $delete.= \Form::close();
            $actions = "<a class='btn btn-success' href=
                         ".route('joborders.show',$data->JobOrderId).">View</a>";
            
            if(Auth::user()['roles'][0]['name'] == 'Admin' || Auth::user()['roles'][0]['name'] == 'Operations' || Auth::user()['roles'][0]['name'] == 'Accounts'){

            $actions.= "<a class='btn btn-primary' href=
                         ".route('joborders.edit',$data->JobOrderId).">Edit</a>";

            $noti = Notification::where("job_order_number",$data->job_order_number)->first();
            if($request->currentrole == "Admin" || (isset($noti->status) && ($noti->status == 2))){
              $actions.= $delete;
            }elseif($noti === null){
              $actions.= "<button type='button' class='btn btn-warning waves-effect m-r-20 deletejob' data-toggle='modal' data-target='#defaultModal' data-id='".$current_user_id."' data-job_order_number='".$data->job_order_number."' data-role='".$request->currentrole."'>Delete</button>";
            }elseif(isset($noti->status) && ($noti->status == 3)){
              $actions.= "<div style='color:red' >Request to delete job Denied</div>"; 
            }else{
              $actions.= "<button type='button' class='btn bg-red waves-effect m-r-20 deletejob'>Request to delete job sent.</button>";  
            }
            if($data->status == 0){
              $actions.= "<button type='button' class='btn btn-info waves-effect m-r-20 deletejob' data-toggle='modal' data-target='#postforexcution' data-job_order_number='".$data->job_order_number."' >Post for Execution</button>";
            }else{
              $actions.= "<button type='button' class='btn waves-effect m-r-20 deletejob' >Posted for Execution</button>";  
            }

            }elseif(Auth::user()['roles'][0]['name'] == 'Tech Services'){
               // if($data->status == 1){
                     $actions.= "<a class='btn btn-primary' href=
                         ".route('joborders.createhardware',$data->job_order_number).">Start Execution</a>";
                     // }else{
                     //   $actions.= "<a class='btn bg-teal waves-effect' >View Hardware</a>"; 
                     // }              
            }
           
          
           // $actions.= ($request->currentrole == "Admin") ? $delete : "<button type='button' class='btn btn-danger waves-effect m-r-20 deletejob' data-toggle='modal' data-target='#defaultModal' data-id='".$current_user_id."' data-job_order_number='".$data->job_order_number."' data-role='".$request->currentrole."'>Delete</button>";
            $profile_image = (!empty($data->profile_image))?$profile_img:""; 
                $result_data[] = array(
                     "id" => $data->JobOrderId,
                     "job_order_number" => $data->job_order_number,
                     "quote_number"=>$data->quote_number,
                     "scope"=>$data->scope,
                     "po_number"=>$data->po_number,
                    // "notes" => "<a href='/joborders/notes/$data->JobOrderId'>Notes</a>",
                     "client_pm"=>$data->name.' ('.$data->email.')',
                     "actions" => $actions
                   );
        }
         $response = array(
         // "draw" => intval($request->draw),
          "iTotalRecords" => JobOrder::count(),
          "iTotalDisplayRecords" => $count,
          "aaData" => $result_data
        );
         return json_encode($response);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $countries = Country::pluck('name','id')->all();
      $client = Client::select('name','email','id')->get(); 
      foreach($client as $cl){
        $clients[$cl->id] = $cl->name.' ('.$cl->email.')';
      } 
      $tasklist = Tasklist::pluck('name','id')->all();
       return view('joborders.create',compact('countries','clients','tasklist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'quote_number' => 'required',
            'dat_of_request' => 'required',
            'quote_value' => 'required',
            'description' => 'required',
            'address' => 'required',
            'hotel_name' => 'required',
            'city' => 'required',            
            'post_code' => 'required',
            'address' => 'required',
            'hotel_contact' => 'required',
            'scope' => 'required',
            'po_number' => 'required',
            'country' => 'required',
            'client_pm' => 'required'
        ]);
               
         $create_element = array('job_order_number' => rand(1000000000, 9999999999),'quote_number' => $request->input('quote_number'),'quote_value' => $request->input('quote_value'),'dat_of_request' => $request->input('dat_of_request'),'description' => $request->input('description'),'address' => $request->input('address'),'hotel_name' => $request->input('hotel_name'),'city' => $request->input('city'),'post_code' => $request->input('post_code'),'address' => $request->input('address'),'hotel_contact' => $request->input('hotel_contact'),'scope' => $request->input('scope'),'po_number' => $request->input('po_number'),'country' => $request->input('country'),'client_pm' => $request->input('client_pm'),"invoice_status" => $request->input('invoice_status'));
        
        JobOrder::create($create_element);
        return redirect()->route('joborders.index')->with('message-type', 'success')
                        ->with('message','JobOrders created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $joborder = JobOrder::find($id);
       $countries = Country::pluck('name','id')->all();
       $client = Client::select('name','email','id')->get(); 
      foreach($client as $cl){
        $clients[$cl->id] = $cl->name.' ('.$cl->email.')';
      } 
       $tasklist = Tasklist::pluck('name','id')->all();
       return view('joborders.show',compact('countries','joborder','clients','tasklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $joborder = JobOrder::find($id);
       $countries = Country::pluck('name','id')->all();
       $client = Client::select('name','email','id')->get(); 
      foreach($client as $cl){
        $clients[$cl->id] = $cl->name.' ('.$cl->email.')';
      } 
       $tasklist = Tasklist::pluck('name','id')->all();
       return view('joborders.edit',compact('countries','joborder','clients','tasklist'));
    }


 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createhardware($job_order_number)
    {
      //  $joborder = JobOrder::find($id);
      //  $countries = Country::pluck('name','id')->all();
      //  $client = Client::select('name','email','id')->get(); 
      // foreach($client as $cl){
      //   $clients[$cl->id] = $cl->name.' ('.$cl->email.')';
      // } 
      //  $tasklist = Tasklist::pluck('name','id')->all();
        $hardware = array(''=>'Choose Hardware','hardware1'=>'hardware1','hardware2'=>'hardware2','hardware3'=>'hardware3','hardware4'=>'hardware4');
        $quantity = array(''=>'Choose Quantity','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6');
       return view('joborders.createhardware',compact('job_order_number','hardware','quantity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
            'job_order_number' => 'required',
            'quote_number' => 'required',
            'dat_of_request' => 'required',
            'quote_value' => 'required',
            'description' => 'required',
            'address' => 'required',
            'hotel_name' => 'required',
            'city' => 'required',            
            'post_code' => 'required',
            'address' => 'required',
            'hotel_contact' => 'required',
            'scope' => 'required',
            'po_number' => 'required',
            'country' => 'required',
            'client_pm' => 'required'
        ]);
         $update_element = array('job_order_number' => $request->input('job_order_number'),'quote_number' => $request->input('quote_number'),'quote_value' => $request->input('quote_value'),'dat_of_request' => $request->input('dat_of_request'),'description' => $request->input('description'),'address' => $request->input('address'),'hotel_name' => $request->input('hotel_name'),'city' => $request->input('city'),'post_code' => $request->input('post_code'),'address' => $request->input('address'),'hotel_contact' => $request->input('hotel_contact'),'scope' => $request->input('scope'),'po_number' => $request->input('po_number'),'country' => $request->input('country'),'client_pm' => $request->input('client_pm'),'task_id' => $request->input('task_id'),"invoice_status" => $request->input('invoice_status')); 
         $joborder = JobOrder::find($id)->update($update_element);
        return redirect()->route('joborders.index')
                         ->with('message-type', 'success')->with('message','JobOrders updated successfully');
    }

    public function notesforProject($id)
    {
        $notes = Note::where('project_id',$id)->get(); 
        return view('joborders.notes',compact('id','notes'));
    }

    public function notesstore(Request $request){
       Note::create(['note' => $request->input('note'),'project_id' => $request->input('project_id')]);
       $id = $request->input('project_id');
        return view('joborders.notes',compact('id'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobOrder::where('id',$id)->delete();
        return redirect()->route('joborders.index')
                         ->with('message-type', 'success')->with('message','JobOrder deleted successfully');
    }
    public function insertnotification(Request $request)
    {
       $notification = array("job_order_number"=>$request->input("joborder_id"),"user_id"=>$request->input("user_id"),"role"=>$request->input("role"),"type"=>"jobNotification","status"=>0);
        Notification::create($notification);
        return 1;
    }    
     public function shownotification(Request $request)
    {
        if($request->crole == "Admin"){
        $notificationselect = Notification::where('type',"jobNotification")->whereIn('status',array("0","1"))->get();
        $html = "";
        $new = "";
        $count = count($notificationselect);
        foreach($notificationselect as $notification){
            $job_order_number = $notification->job_order_number;           
            $jobOrder = JobOrder::where('job_order_number',$notification->job_order_number)->get();
            $user_id = $notification->user_id;
            $userData = User::where('id',$user_id)->first();
            $role = $notification->role;
            $type = $notification->type;
            $created_at = strtotime($notification->created_at);
            $currentDate = strtotime(date('Y-m-d H:i:s')); 
            $diff = abs($currentDate - $created_at); 
            $years = floor($diff / (365*60*60*24)); 
            $months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24));  
            $days = floor(($diff - $years * 365*60*60*24 -  
            $months*30*60*60*24)/ (60*60*24)); 
            $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) 
                                   / (60*60));  
            $new = $notification->status;
            $html.= "<li>
                     <a href='' class='jobnotification' data-toggle='modal' data-id='".$jobOrder[0]->id."' data-target='#notificationModal' data-uname='".$userData->name."' data-role='".$notification->role."' data-job_order_number='".$notification->job_order_number."' > 
                        <div class='icon-circle bg-orange'>
                            <i class='material-icons'>delete_forever</i>
                            </div>
                      <div class='menu-info'>
                        <h4><b>User Name: $userData->name</b></h4>
                        <h4><b>Role: $notification->role</b></h4>
                        <p>Wants to delete job number $notification->job_order_number</p>
                        <p>
                           <i class='material-icons'>access_time</i> $hours hours ago
                        </p>
                      </div>
                    </a>
                </li>";
        }
        $response = json_encode(array("count" => $count,"html"=>$html,"new"=>$new));
        }else{
        $response = "";
        }
        return $response;
    }

    public function notificationstatus(){
        $res = Notification::where("status",0)->update(array("status"=>1));
        return $res;
    }

     public function notificationread(Request $request){
        $res = Notification::where("job_order_number",$request->job_order_number)->update(array("status" => $request->status));
        $joborder = JobOrder::where("job_order_number",$request->job_order_number);
        $joborder->delete();
        $request->session()->flash("message","JobOrder deleted successfully");
        $request->session()->flash('message-type', 'success');

        return response()->json([]);
    }

    public function postforexcution(Request $request){
            $joborder = Joborder::where("job_order_number",$request->job_order_number)->get();
            $joborder[0]->status = 1;
            $joborder[0]->save();
            $request->session()->flash("message","Job posted for execution successfully");
            $request->session()->flash('message-type', 'success');
            return response()->json([]);
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hardwarestore(Request $request)
    { 
       $this->validate($request, [
            'hardware' => 'required',
            'quantity' => 'required'
        ]);

        $delivery_status = (isset($request->delivery_status) && $request->delivery_status == 'on')?1:0;
        $publish_status = (isset($request->publish) && $request->publish == 'on')?1:0;     

        $hardware_element = array('hardware_name' => $request->hardware,'job_order_number'=> $request->job_order_number,'quantity' => $request->quantity,'configuration_status' => $request->conf_status,'shipped' => $request->shipped, 'delivery_status'=> $delivery_status,'notes'=> $request->notes,'publish'=> $publish_status);
        Hardware::create($hardware_element);
        JobOrder::where('job_order_number',$request->job_order_number)->update(array('status'=>2));
        if($request->submit == 'submit'){
            return redirect()->route('joborders.index')->with('message-type', 'success')
                            ->with('message','Hardware added successfully');
        }elseif($request->submit == 'addmore'){
            return redirect()->route('joborders.createhardware', $request->job_order_number);
        }elseif($request->submit == 'cableModule'){
            return redirect()->route('joborders.createhardware', $request->job_order_number);
        }
        
    } 

}
