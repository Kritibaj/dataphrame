<?php


namespace BPMS\Http\Controllers;


use Illuminate\Http\Request;
use BPMS\Http\Controllers\Controller;
use BPMS\User;
use Spatie\Permission\Models\Role;
use BPMS\Department;
use BPMS\UserHasDepartment;
use BPMS\ModelHasRole;
use DB;
use Hash;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = User::orderBy('id','DESC')->paginate(5);
        $roles = Role::all();
        $departments = Department::all();
        return view('users.index',compact('data','roles','departments'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxrequestUser(Request $request)
    {
        $usersQuery = User::select('*','users.id as userId','users.name as userName')->leftJoin('model_has_roles',"users.id","=","model_has_roles.model_id")->leftJoin('user_has_departments',"users.id","=","user_has_departments.user_id")->join('roles',"roles.id","=","model_has_roles.role_id")->join('departments',"departments.id","=","user_has_departments.department_id");
        if(isset($request->searchByRole) && !empty($request->searchByRole)){
            $usersQuery->where('model_has_roles.role_id',$request->searchByRole);
        }
        if(isset($request->searchByDepartment) && !empty($request->searchByDepartment)){
            $usersQuery->where('user_has_departments.department_id',$request->searchByDepartment);
        }
        if(isset($request->searchByEmployeeno) && !empty($request->searchByEmployeeno)){
            $usersQuery->where('users.employee_number','like', '%' .$request->searchByEmployeeno. '%');
        }
        if(isset($request->searchByName) && !empty($request->searchByName)){
            $usersQuery->where('users.name','like', '%' .$request->searchByName. '%');
        } 
        $count = $usersQuery->count();
        $start = $request->start;
        $operator = "plus";
        $columnIndex = $request->order[0]['column']; 
        $columnSortOrder = $request->order[0]['dir'];
        $coloumnName = $request->columns[$columnIndex]['data'];
        if($coloumnName == 'roles'){
            $coloumnName = "roles.name";
        }
        if($coloumnName == 'department'){
            $coloumnName = "departments.name";
        }        
        if($coloumnName == 'id' || $coloumnName == 'actions'){
            $coloumnName = "userId";
            if($columnSortOrder == 'desc'){
                $operator = "minus";
                $start = $count-($request->start);
            }
        }
        if($coloumnName == 'name'){
            $coloumnName = "userName";
        }

        
        $datas = $usersQuery->groupby('userName')->offset($request->start)
                ->limit($request->length)->orderby($coloumnName,$columnSortOrder)->get();
        //Search by role
        // $model_ids = ModelHasRole::select('model_id')->where('role_id',$request->searchByRole)->get();
        // foreach($model_ids as $model_id){
        //     $userIdsByrole[] = ($model_id->model_id)?($model_id->model_id):0;
        // } 

        //Search by department
        // $user_ids = UserHasDepartment::select('user_id')->where('department_id',$request->searchByRole)->get();
        // foreach($user_ids as $user_id){
        //     $userIdsBydepartment[] = ($user_id->user_id)?($user_id->user_id):0;
        // } 
        //$userIds = array_merge()
        // if(!empty($request->searchByRole) && isset($userIdsByrole)){
        //     $datas = User::whereIn('id',$userIdsBydepartment)->get();
        // }else{
        //     $datas = User::all();
        // }

       
        $result_data = array();

        foreach($datas as $data){ 
            $roles = "";
            $data->id = $data->userId;
            if(!empty($data->getRoleNames())){
                foreach($data->getRoleNames() as $v){
                   $roles.= "<label class='badge badge-success'>";
                   $roles.= $v;
                   $roles.= "</label>";
                }

            }
            $department = "";
            if(!empty($data->getDepartmentNames())){
                foreach($data->getDepartmentNames() as $v){
                   $department.= "<label class='badge badge-success'>";
                   $department.= $v;
                   $department.= "</label>";
                }

            }
            $srcsource = route('users.show',$data->id);
            $delete = \Form::open(['method' => 'DELETE','route' => ['users.destroy', $data->id],'style'=>'display:inline']);
            $delete.= \Form::submit('Delete', ['class' => 'btn btn-danger']);
            $delete.= \Form::close();
            $actions = "<a class='btn btn-primary' href=
                         ".route('users.edit',$data->id).">Edit</a>$delete";

            if($operator == "minus"){
                $id = $start--;
            }else{
                $id = ++$start;
            } 
            //profile_image
             $src = 'storage/profile_image/'.$data->profile_image;
            $profile_img = "<img src=".asset($src)." width='50px' heigth='50px' >";
            $profile_image = (!empty($data->profile_image))?$profile_img:""; 
                $result_data[] = array(
                     "id" => $id,
                     "profile_image" => $profile_image,
                     "name"=>$data->userName,
                     "employee_number"=>$data->employee_number,
                     "roles"=>$roles,
                     "department"=>$department,
                     "actions"=>$actions
                   );
        }
         $response = array(
          "draw" => intval($request->draw),
          "iTotalRecords" => User::count(),
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
        $roles = Role::pluck('name','name')->all();
        $departments = Department::pluck('name','id')->all();
        return view('users.create',compact('roles','departments'));
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
            'dob' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'departments' => 'required',
            'roles' => 'required',
            'employee_number' => 'required' 
        ]);
        $docs = $request->file('profile_image');
        $fileContent = $docs->get();
        $extension = $docs->getClientOriginalExtension();
        $filename  = 'user-image-' . time() .  '-' . rand() . '.' . $extension; 
        $imageLocation = 'profile_image/'.$filename;

        // Store the encrypted Content
        \Storage::put($imageLocation, $fileContent);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['profile_image'] = $filename;


        //dd($input['departments']);
        $user = User::create($input);
        $useerId = $user->id;
        
        foreach($input['departments'] as $depart){ 
        $department =  new UserHasDepartment;
        $department->user_id = $useerId;
        $department->department_id = $depart;
        $department->save();
        }        
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
     }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $departments = Department::pluck('name','id')->all();
        $selectedDepartment = UserHasDepartment::select('department_id')->where('user_id',$id)->get();
        foreach($selectedDepartment as $sdepartment){ 
             $selectedDepartments[] = $sdepartment->department_id;
        }
        $selectedDepartments = (!empty($selectedDepartments))?$selectedDepartments:0;
        return view('users.edit',compact('user','roles','userRole','departments','selectedDepartments'));
    }

/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        $departments = Department::pluck('name','id')->all();
        $selectedDepartment = UserHasDepartment::select('department_id')->where('user_id',$id)->get();
        foreach($selectedDepartment as $sdepartment){ 
             $sdepartment_name = Department::select('name')->where('id',$sdepartment->department_id)->get();
             $selectedDepartments[] = $sdepartment_name[0]->name;
        } 
        return view('users.profile',compact('user','roles','userRoles','departments','selectedDepartments'));
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
            'dob' => 'required',
            'departments' => 'required',
            'roles' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'employee_number' => 'required' 
        ]);
        
         $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }


        $docs = $request->file('profile_image'); echo ($docs); 
        if(!empty($docs)){
        $fileContent = $docs->get();
        $extension = $docs->getClientOriginalExtension();
        $filename  = 'user-image-' . time() .  '-' . rand() . '.' . $extension;
        $imageLocation = 'profile_image/'.$filename;        
        // Store the encrypted Content
        \Storage::put($imageLocation, $fileContent);
        $input['profile_image'] = $filename;
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        if(!empty($input['departments'])){
            DB::table('user_has_departments')->where('user_id', '=', $id)->delete();
            foreach($input['departments'] as $depart){ 
                $department =  new UserHasDepartment;
                $department->user_id = $id;
                $department->department_id = $depart;
                $department->save();
            } 
        }

        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $image_path = "/profile_image/$user->profile_image"; 

        if(\Storage::exists($image_path)) { 
            \Storage::delete($image_path);
        }
        User::find($id)->delete();
        UserHasDepartment::where('user_id',$id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}