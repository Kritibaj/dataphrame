<?php

namespace BPMS\Http\Controllers;

use Illuminate\Http\Request;
use BPMS\JobOrder;
use BPMS\Country;
use BPMS\Client;
use BPMS\Tasklist;
use BPMS\Note;

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

    public function ajaxrequestJobOrder(){
        $jobOrderQuery = JobOrder::select('*','job_orders.id as JobOrderId')->leftJoin('clients',"clients.id","=","job_orders.client_pm");
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
        $datas = $jobOrderQuery->get();  

        $result_data = array();

        foreach($datas as $data){ 
            $delete = \Form::open(['method' => 'DELETE','route' => ['joborders.destroy', $data->JobOrderId],'style'=>'display:inline']);
            $delete.= \Form::submit('Delete', ['class' => 'btn btn-danger']);
            $delete.= \Form::close();
            $actions = "<a class='btn btn-primary' href=
                         ".route('joborders.edit',$data->JobOrderId).">Edit</a>$delete";

            $profile_image = (!empty($data->profile_image))?$profile_img:""; 
                $result_data[] = array(
                     "id" => $data->JobOrderId,
                     "job_order_number" => $data->job_order_number,
                     "quote_number"=>$data->quote_number,
                     "quote_value"=>$data->quote_value,
                     "description"=>$data->description,
                     "scope"=>$data->scope,
                     "po_number"=>$data->po_number,
                     "notes" => "<a href='/joborders/notes/$data->JobOrderId'>Notes</a>",
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
               
         $create_element = array('job_order_number' => mt_rand(1000000000, 9999999999),'quote_number' => $request->input('quote_number'),'quote_value' => $request->input('quote_value'),'dat_of_request' => $request->input('dat_of_request'),'description' => $request->input('description'),'address' => $request->input('address'),'hotel_name' => $request->input('hotel_name'),'city' => $request->input('city'),'post_code' => $request->input('post_code'),'address' => $request->input('address'),'hotel_contact' => $request->input('hotel_contact'),'scope' => $request->input('scope'),'po_number' => $request->input('po_number'),'country' => $request->input('country'),'client_pm' => $request->input('client_pm'));
        
        JobOrder::create($create_element);
        return redirect()->route('joborders.index')
                        ->with('success','JobOrders created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
         $create_element = array('job_order_number' => $request->input('job_order_number'),'quote_number' => $request->input('quote_number'),'quote_value' => $request->input('quote_value'),'dat_of_request' => $request->input('dat_of_request'),'description' => $request->input('description'),'address' => $request->input('address'),'hotel_name' => $request->input('hotel_name'),'city' => $request->input('city'),'post_code' => $request->input('post_code'),'address' => $request->input('address'),'hotel_contact' => $request->input('hotel_contact'),'scope' => $request->input('scope'),'po_number' => $request->input('po_number'),'country' => $request->input('country'),'client_pm' => $request->input('client_pm'));
         $joborder = JobOrder::find($id)->update($create_element);
        return redirect()->route('joborders.index')
                        ->with('success','JobOrders updated successfully');
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
                        ->with('success','JobOrder deleted successfully');
    }
}
