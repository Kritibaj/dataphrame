<?php

namespace BPMS\Http\Controllers;

use Illuminate\Http\Request;
use BPMS\Client;
use BPMS\Country;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class ClientController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         // $this->middleware('permission:client-list');
         // $this->middleware('permission:client-create', ['only' => ['create','store']]);
         // $this->middleware('permission:client-edit', ['only' => ['edit','update']]);
         // $this->middleware('permission:client-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::orderBy('id','DESC')->paginate(5);
        $countries = Country::all();
        return view('clients.index',compact('clients','countries'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxrequestClient(Request $request)
    {
        $clientsQuery = Client::select('*','countries.name as cname','clients.name as clname','clients.id as clId')->join('countries','clients.country','=','countries.id');
        if(isset($request->searchByRegion) && !empty($request->searchByRegion)){
            $clientsQuery->where('clients.region','like', '%' .$request->searchByRegion. '%');
        }
        if(isset($request->searchByCountry) && !empty($request->searchByCountry)){
            $clientsQuery->where('clients.country',$request->searchByCountry);
        }
        if(isset($request->searchByClientOrganization) && !empty($request->searchByClientOrganization)){
            $clientsQuery->where('clients.ClientOrganization','like', '%' .$request->searchByClientOrganization. '%');
        }
        if(isset($request->searchByclientName) && !empty($request->searchByclientName)){
            $clientsQuery->where('clients.name','like', '%' .$request->searchByclientName. '%');
        }
        $count = $clientsQuery->count();
        $start = $request->start;
        $operator = "plus";
        $columnIndex = $request->order[0]['column']; 
        $columnSortOrder = $request->order[0]['dir'];
        $coloumnName = $request->columns[$columnIndex]['data'];
        if($coloumnName == 'id' || $coloumnName == 'actions'){
            $coloumnName = "clId";
            if($columnSortOrder == 'desc'){
                $operator = "minus";
                $start = $count-($request->start);
            }
        }
        if($coloumnName == 'name'){
            $coloumnName = "clname";
        }        
        $datas = $clientsQuery->offset($request->start)
                ->limit($request->length)->orderby($coloumnName,$columnSortOrder)->get();
      
       
        $result_data = array();

        foreach($datas as $data){
          
            $srcsource = route('clients.show',$data->clId);
            $delete = \Form::open(['method' => 'DELETE','route' => ['clients.destroy', $data->clId],'style'=>'display:inline']);
            $delete.= \Form::submit('Delete', ['class' => 'btn btn-danger']);
            $delete.= \Form::close();
            $actions = "<a class='btn btn-primary' href=
                         ".route('clients.edit',$data->clId).">Edit</a>$delete";
            if($operator == "minus"){
                $id = $start--;
            }else{
                $id = ++$start;
            } 
    
                $result_data[] = array(
                     "id" => $id,
                     "name"=>$data->clname,
                     "ClientOrganization"=>$data->ClientOrganization,
                     "country"=>$data->cname,
                     "region"=>$data->region,
                     "actions"=>$actions
                   );
        }

         $response = array(
          "draw" => intval($request->draw),
          "iTotalRecords" => client::count(),
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
        $permission = Permission::get();
        $countries = Country::pluck('name','id')->all();
        return view('clients.create',compact('permission','countries'));
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
            'name' => 'required',
            'ClientOrganization' => 'required',
            'country' => 'required',
            'region' => 'required',
            'address' => 'required'
        ]);

        $create_element = array('name' => $request->input('name'),'ClientOrganization' => $request->input('ClientOrganization'),'country' => $request->input('country'),'region' => $request->input('region'),'address' => $request->input('address'));
            $create_element['OtherInformation'] = (!empty($request->input('OtherInformation')))?$request->input('OtherInformation'):"";
        $user = Client::create($create_element)->toSql();        
        return redirect()->route('clients.index')
                        ->with('success','Clients created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('clients.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        //     ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //     ->all();
        $countries = Country::pluck('name','id')->all();
        return view('clients.edit',compact('client','countries'));
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
            'name' => 'required',
            'ClientOrganization' => 'required',
            'country' => 'required',
            'region' => 'required',
            'address' => 'required'
        ]);


        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->ClientOrganization = $request->input('ClientOrganization');        
        $client->country = $request->input('country');
        $client->region = $request->input('region');               
        $client->address = $request->input('address');
        $client->OtherInformation = (!empty($request->input('OtherInformation')))?$request->input('OtherInformation'):"";
        $client->save();

        return redirect()->route('clients.index')
                        ->with('success','Client updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("clients")->where('id',$id)->delete();
        return redirect()->route('clients.index')
                        ->with('success','Client deleted successfully');
    }
}
