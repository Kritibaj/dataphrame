<?php

namespace BPMS\Http\Controllers;
use Illuminate\Http\Request;
use BPMS\Hardware;
use Auth;
use Session;

class HardwareController extends Controller
{


	public function index()
    {
        $hardware = Hardware::all();
        return view('hardware.index',compact('hardware'));
    }

	public function ajaxrequestHardware(Request $request){

		$hardwareQuery = Hardware::select('*');
		if(isset($request->searchByHardware) && !empty($request->searchByHardware)){
            $hardwareQuery->where('hardware_name','like', '%' .$request->searchByHardware.'%');
        }
        if(isset($request->searchByJobOrder) && !empty($request->searchByJobOrder)){
            $hardwareQuery->where('job_order_number','like', '%' .$request->searchByJobOrder.'%');
        }

        $result_data = array();

		$count =  $hardwareQuery->count();
		$datas = $hardwareQuery->get();
		foreach($datas as $data){	

			if($data->configuration_status == 2){
				$confStatus = "Ready";	
				$class = "bg-green";				
			}elseif($data->configuration_status == 1){
				$confStatus = "In Progress";
				$class = "bg-yellow";	
			}else{
				$confStatus = "Not Ready";						
				$class = "bg-red";	
			}
			if($data->shipped == 2){
				$shippedstatus = "Ready";	
				$shippedclass = "bg-green";				
			}elseif($data->shipped == 1){
				$shippedstatus = "In Progress";
				$shippedclass = "bg-yellow";	
			}else{
				$shippedstatus = "Not Ready";						
				$shippedclass = "bg-red";	
			}

			if($data->delivery_status == 1){
				$deliverystatus = "Delivered";	
				$deliveryclass = "bg-purple";				
			}else{
				$deliverystatus = "Not Delivered";
				$deliveryclass = "bg-deep-orange";	
			}

			$result_data[] = array(
                     "id" => $data->id,
                     "hardware" => $data->hardware_name,
                     "job_order_number"=>$data->job_order_number,
                     "quantity"=>$data->quantity,
                     "delivery_status"=>"<button type='button' class='btn $deliveryclass waves-effect'>$deliverystatus</button>",
                     "configuration_status"=> "<button type='button' class='btn $class waves-effect'>$confStatus</button>",
                    // "notes" => "<a href='/joborders/notes/$data->JobOrderId'>Notes</a>",
                     "shipped_for_deployement"=> "<button type='button' class='btn $shippedclass waves-effect'>$shippedstatus</button>",
                     "action" => "<a class='btn btn-primary' href=
                         ".route('hardware.edit',$data->id).">Edit</a>"
                   );
		}

	    $response = array(
         // "draw" => intval($request->draw),
          "iTotalRecords" => Hardware::count(),
          "iTotalDisplayRecords" => $count,
          "aaData" => $result_data
        );
         return json_encode($response);		
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
            'hardware' => 'required',
            'quantity' => 'required'
        ]);

        $delivery_status = (isset($request->delivery_status) && $request->delivery_status == 'on')?1:0;
        $publish_status = (isset($request->publish) && $request->publish == 'on')?1:0;     

        $hardware_element = array('hardware' => $request->hardware,'job_order_number'=> $request->job_order_number,'quantity' => $request->quantity,'configuration_status' => $request->conf_status,'shipped' => $request->shipped, 'delivery_status'=> $delivery_status,'notes'=> $request->notes,'publish'=> $publish_status);
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

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $hardware = Hardware::find($id);  
        $hardwareselect = array(''=>'Choose Hardware','hardware1'=>'hardware1','hardware2'=>'hardware2','hardware3'=>'hardware3','hardware4'=>'hardware4');
        $quantity = array(''=>'Choose Quantity','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6');
                      
        return view('hardware.edit',compact('hardware','hardwareselect','quantity'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'hardware_name' => 'required',
            'quantity' => 'required',
        ]);

        $delivery_status = (isset($request->delivery_status) && $request->delivery_status == 'on')?1:0;
        $publish_status = (isset($request->publish) && $request->publish == 'on')?1:0;     

        $hardware_element = array('hardware_name' => $request->hardware_name,'job_order_number'=> $request->job_order_number,'quantity' => $request->quantity,'configuration_status' => $request->conf_status,'shipped' => $request->shipped, 'delivery_status'=> $delivery_status,'notes'=> $request->notes,'publish'=> $publish_status);
        Hardware::where(array("id"=>$id))->update($hardware_element);

        return redirect()->route('hardware.index')
                         ->with('message-type', 'success')->with('message','Hardware updated successfully');

    }
    
}

?>