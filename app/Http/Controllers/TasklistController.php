<?php

namespace BPMS\Http\Controllers;

use Illuminate\Http\Request;
use BPMS\Tasklist;

class TasklistController extends Controller
{
	/*
    * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasklists = Tasklist::all();
        return view('tasklists.index',compact('tasklists'));
    }

 	public function ajaxrequestTasklist(Request $request)
    {
        $tasklists = Tasklist::select('*');
        if(isset($request->searchBytasklist) && !empty($request->searchBytasklist)){
           $tasklists->where('tasklists.name','like', '%' .$request->searchBytasklist. '%');

        }
        $result_data = array();
        $count = $tasklists->count();
        $columnIndex = $request->order[0]['column']; 
        $columnSortOrder = $request->order[0]['dir'];
        $coloumnName = $request->columns[$columnIndex]['data'];
        if($coloumnName == 'actions'){
            $coloumnName = "tasklists.id";
        }
        $data = $tasklists->offset($request->start)
                ->limit($request->length)->orderby($coloumnName,$columnSortOrder)->get();
        foreach($data as $tasklist){        	
        	        $delete = \Form::open(['method' => 'DELETE','route' => ['tasklists.destroy', $tasklist->id],'style'=>'display:inline']);
			        $delete.= \Form::submit('Delete', ['class' => 'btn btn-danger']);
			        $delete.= \Form::close();
			        $actions = "<a class='btn btn-primary' href=
			                     ".route('tasklists.edit',$tasklist->id).">Edit</a>$delete";
        	 $result_data[] = array(
                     "id" => $tasklist->id,
                     "name"=>$tasklist->name,
                     "actions"=>$actions
                   );

        }      
       
         $response = array(
          "draw" => intval($request->draw),
          "iTotalRecords" => Tasklist::count(),
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
        return view('tasklists.create');
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
            'name' => 'required'
        ]);

        Tasklist::create(['name'=>$request->input('name')]);
        return redirect()->route('tasklists.index')->with('message-type', 'success')
                        ->with('message','Tasklist created successfully');
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
        $tasklist = Tasklist::find($id);       
        return view('tasklists.edit',compact('tasklist'));
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
        ]);
        $tasklist = Tasklist::find($id)->update(['name'=> $request->input('name')]);
        return redirect()->route('tasklists.index')->with('message-type', 'success')
                        ->with('message','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tasklist::find($id)->delete();
        return redirect()->route('tasklists.index')->with('message-type', 'success')
                        ->with('message','Task deleted successfully');
    }
}
