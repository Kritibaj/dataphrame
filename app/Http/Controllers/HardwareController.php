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
		$datas = Hardware::all();
		$count =  $datas->count();
		foreach($datas as $data){
			$result_data[] = array(
                     "id" => $data->id,
                     "hardware" => $data->hardware,
                     "job_order_number"=>$data->job_order_number,
                     "quantity"=>$data->quantity,
                     "delivery_status"=>$data->delivery_status,
                     "configuration_status"=>$data->configuration_status,
                    // "notes" => "<a href='/joborders/notes/$data->JobOrderId'>Notes</a>",
                     "shipped_for_deployement"=>$data->shipped,
                     "action" => ""
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
    
}

?>