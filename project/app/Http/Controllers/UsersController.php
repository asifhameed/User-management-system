<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Yajra\DataTables\DataTables;

use View;
use Validator;
use Auth;

class UsersController extends Controller
{
    public $data = array();
    protected $file_path = "";
    protected $route_path = "users";
    protected $home_path = "users.index";
    protected $section_id;
    protected $index_tag;
    protected $view_tag;
    protected $add_tag;
    protected $edit_tag;
    protected $delete_tag;
    public function __construct()
    {
        $this->data['title'] = 'Users';
        $this->data['singulartitle'] = 'User';
        $this->data['log_title'] = 'User';        
        $this->data['slug'] = 'users';
        $this->file_path = 'users'; 
        
        // Roles 
        $this->section_id = '2';
        $this->index_tag = 'index-user';
        $this->view_tag = 'view-user';
        $this->add_tag = 'add-user';
        $this->edit_tag = 'edit-user';
        $this->delete_tag = 'delete-user';
        View::share('singulartitle', $this->data['singulartitle']);
        View::share('sectionId', $this->section_id);
        View::share('addTag', $this->add_tag);
        // End Roles

        View::share('route_path', $this->route_path);
        View::share('home_path', $this->home_path);
    }
    public function index(Request $request)
    {
        if(!has_permission($this->section_id, $this->index_tag)) return redirect()->route('users')->with('error', config("constants._NO_ACCESS_MESSAGE"));
        $data = $this->data;
        if ($request->ajax()) 
        {            
            $records = User::latest();
            if(Auth::user()->role_id_fk == 2)
            {
                $records = $records->Where('role_id_fk', 3);
            }
            else if(Auth::user()->role_id_fk == 3)
            {
                $records = $records->Where('id', Auth::id());
            }
            $records = $records->get();
            if($request->get('status') != null) $records = $records->Where('status', '=', $request->get('status'));
            
            return DataTables::of($records)
                ->addIndexColumn()
                ->addColumn('role_id_fk', function($row){
                    $rows = ($row->rolse->display_name) ?? 'N/A';
                   return $rows;
                }) 
                ->addColumn('status', function($row){
                    return dataTable_fetching_status($row->id, $this->route_path, $row->status, $this->section_id, $this->edit_tag);
                })  
                ->addColumn('action', function($row){
                    return dataTable_fetching_actions($row->id, $this->route_path, $this->section_id, $this->edit_tag, $this->delete_tag);
                })
                ->rawColumns(array("user_picture", "role_id_fk", "status", "action"))
                ->make(true);
        }        
        return view($this->file_path.'.listing', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!has_permission($this->section_id, $this->add_tag)) return redirect()->route('users')->with('error', config("constants._NO_ACCESS_MESSAGE"));
        $result_roles = Role::Where('status', 1)->get();
        $data = $this->data;
        return view($this->file_path.'.create', get_defined_vars());
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!has_permission($this->section_id, $this->add_tag)) return redirect()->route('users')->with('error', config("constants._NO_ACCESS_MESSAGE"));
        $validation = Validator::make( $request->all(), [
            'name' => 'required',
            'email' => 'required|max:30|unique:users,email',
            'password' => 'required|min:5|max:15|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'min:5',
            'roles' => 'required'
        ]);
        
        $validation->validate();

        $date = date("Y-m-d H:i:s");
        $requestData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id_fk' => $request->roles,
            'status' => $request->status,
            'created_at' => $date,
            'updated_at' => $date
        ];
        $insert = User::create($requestData);            
        if($insert)
        {
            return redirect()->route($this->route_path.'.index')->with('success', config('constants._ADD_SUCCESSFULLY_MESSAGE'));
        }
        else
        {
            return redirect()->route($this->route_path.'.create')->with('error', config('constants._ADD_ERROR_MESSAGE'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!has_permission($this->section_id, $this->view_tag)) return redirect()->route('users')->with('error', config("constants._NO_ACCESS_MESSAGE"));
        $records = User::findOrFail($id);
        $result_roles = Role::Where('status', 1)->get();
        $data = $this->data;
        return view($this->file_path.'.view', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!has_permission($this->section_id, $this->edit_tag)) return redirect()->route('users')->with('error', config("constants._NO_ACCESS_MESSAGE"));
        $records = User::findOrFail($id);
        $result_roles = Role::Where('status', 1)->get();
        $data = $this->data;
        return view($this->file_path.'.edit', get_defined_vars());          
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
        if(!has_permission($this->section_id, $this->edit_tag)) return redirect()->route('users')->with('error', config("constants._NO_ACCESS_MESSAGE"));
        $record = User::findOrFail($id);
        if($record)    
        {
            $fileArray = array(
                'name' => $request->name,
                'roles' => $request->roles,
            );
            $rules = array(
                'name' => 'required',
                'roles' => 'required',                
            );
            if(!empty($request->password))
            {
                $fileArray['password'] = $request->password;
                $fileArray['confirmpassword'] = $request->confirm_password;
                $rules['password'] = 'required|min:5|max:15|required_with:confirmpassword|same:confirmpassword';
                $rules['confirmpassword'] = 'min:5';
            }
            
            $validation = Validator::make($fileArray, $rules);

            $validation->validate();

            $date = date("Y-m-d H:i:s");
            $requestData = [
                'name' => $request->name,
                'role_id_fk' => $request->roles,
                'status' => $request->status,
                'updated_at' => $date
            ];
            if($request->status == 0)
            {
                $requestData['blocked_at'] = $date;
            }
            else
            {
                $requestData['blocked_at'] = NULL;
            }
            if(!empty($request->password))
            {
                $requestData['password'] = Hash::make($request->password);
            }
            
            $recordUpdate = User::where('id', $id)->update($requestData);
            if($recordUpdate)
            {
                return redirect()->route($this->route_path.'.index')->with('success', config('constants._UPDATE_SUCCESSFULLY_MESSAGE'));
            }
        }
        else
        {
            return redirect()->route($this->route_path.'.update', $id)->with('error', config('constants._EDIT_ERROR_MESSAGE'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!has_permission($this->section_id, $this->delete_tag)) return 3;
        $record = User::findOrFail($request->id);
        $del = $record->delete();
        if($del)
        {
            return 1;
        }
        return 0;
    }
    

    public function status_update(Request $request)
    {
        if(!has_permission($this->section_id, $this->edit_tag)) return response()->json(['error'=> config("constants._NO_ACCESS_SHORT_MESSAGE")]);
        $record = User::Where('id', $request->id)->first();
        if($record)
        {
            $recordUpdate = User::findOrFail($request->id);
            $recordUpdate->status = $request->statusinfo;
            if($request->statusinfo == 0)
            {
                $recordUpdate->blocked_at = date("Y-m-d H:i:s");
            }
            else
            {
                $recordUpdate->blocked_at = NULL;
            }
            $recordUpdate->save();
            if($recordUpdate){
                return response()->json(['success'=> config('constants._STATUS_UPDATE_MESSAGE')]);
            }
        }
        else
        {
            return response()->json(['error'=> config('constants._STATUS_UPDATE_ERROR_MESSAGE')]);
        }
        
    }
}
