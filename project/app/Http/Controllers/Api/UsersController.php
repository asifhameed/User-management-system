<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Auth; 
use Validator;
use Hash;

class UsersController extends Controller
{
    public $successStatus = 200;
    public function index()
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
        if(count($records) > 0)
        {
            foreach($records as $key=>$rows)
            {
                $data[$key] = [
                    'id' => (int)$rows->id,
                    'name' => $rows->name,
                    'email' => $rows->email,
                    'role_id' => (int)$rows->role_id_fk,
                    'role_name' => $rows->rolse->name,
                    'status' => $rows->status,
                    'blocked_at' => $rows->blocked_at,
                    'created_at' => $rows->created_at,
                    'updated_at' => $rows->updated_at
                ];
            }
            $success = [
                'status' => true,
                'message' => 'Data fetch successfully.',
                'data' => $data
            ];
        }
        else
        {
            $success = [
                'status' => false,
                'message' => 'Records not found.'
            ];
        }
        
        return response()->json($success, $this->successStatus);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',  
            'password' => 'required', 
            'confirmpassword' => 'required|same:password'
        ]);
        if ($validator->fails()) { 
            $success = [
                'status' => false,
                'message' => implode(', ', $validator->messages()->all())
            ];
            return response()->json($success, $this->successStatus);        
        }
        $record = User::Where('id', $request->id)->first();
        if($record)    
        {
            $date = date("Y-m-d H:i:s");
            $requestData = [
                'name' => $request->name,
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

            if(Auth::user()->role_id_fk == 1)
            {
                $recordUpdate = User::where('id', $request->id)->update($requestData);
                if($recordUpdate)
                {
                    $records = User::Where('id', $request->id)->first();
                    $success = [
                        'status' => true,
                        'message' => 'Record update successfully.',
                        'data' => $records
                    ];
                }
                else
                {
                    $success = [
                        'status' => false,
                        'message' => 'Error, Record not update.'
                    ]; 
                }
            }
            else if((Auth::user()->role_id_fk == 2) && ($record->role_id_fk == 2) && ($record->id == Auth::id()))
            {
                $recordUpdate = User::where('id', $request->id)->update($requestData);
                if($recordUpdate)
                {
                    $records = User::Where('id', $request->id)->first();
                    $success = [
                        'status' => true,
                        'message' => 'Record update successfully.',
                        'data' => $records
                    ];
                }
                else
                {
                    $success = [
                        'status' => false,
                        'message' => 'Error, Record not update.'
                    ]; 
                }
            }
            else if((Auth::user()->role_id_fk == 2) && ($record->role_id_fk == 3))
            {
                $recordUpdate = User::where('id', $request->id)->update($requestData);
                if($recordUpdate)
                {
                    $records = User::Where('id', $request->id)->first();
                    $success = [
                        'status' => true,
                        'message' => 'Record update successfully.',
                        'data' => $records
                    ];
                }
                else
                {
                    $success = [
                        'status' => false,
                        'message' => 'Error, Record not update.'
                    ]; 
                }
            }            
            else if((Auth::user()->role_id_fk == 3) && ($record->role_id_fk == 3) && ($record->id == Auth::id()))
            {
                $recordUpdate = User::where('id', $request->id)->update($requestData);
                if($recordUpdate)
                {
                    $records = User::Where('id', $request->id)->first();
                    $success = [
                        'status' => true,
                        'message' => 'Record update successfully.',
                        'data' => $records
                    ];
                }
                else
                {
                    $success = [
                        'status' => false,
                        'message' => 'Error, Record not update.'
                    ]; 
                }
            }
            else
            {
                $success = [
                    'status' => false,
                    'message' => 'Error, Sorry you have no permission to update the record.'
                ];
            }

            
        }
        else
        {
            $success = [
                'status' => false,
                'message' => 'Error, Record not found.'
            ];
        }
        return response()->json($success, $this->successStatus);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'id' => 'required'
        ]);
        if ($validator->fails()) { 
            $success = [
                'status' => false,
                'message' => implode(', ', $validator->messages()->all())
            ];
            return response()->json($success, $this->successStatus);        
        }
        $record = User::Where('id', $request->id)->first();
        if($record)    
        {
            if(Auth::user()->role_id_fk == 1)
            {
                $del = $record->delete();
                if($del)
                {                    
                    $success = [
                        'status' => true,
                        'message' => 'Record deleted successfully.'
                    ];
                }
                else
                {
                    $success = [
                        'status' => false,
                        'message' => 'Error, Record not delete.'
                    ]; 
                }
            }
            else if((Auth::user()->role_id_fk == 2) && ($record->role_id_fk == 3))
            {
                $del = $record->delete();
                if($del)
                {                    
                    $success = [
                        'status' => true,
                        'message' => 'Record deleted successfully.'
                    ];
                }
                else
                {
                    $success = [
                        'status' => false,
                        'message' => 'Error, Record not delete.'
                    ]; 
                }
            }
            else
            {
                $success = [
                    'status' => false,
                    'message' => 'Error, Sorry you have no permission to delete the record.'
                ];
            }
            
        }
        else
        {
            $success = [
                'status' => false,
                'message' => 'Error, Record not found.'
            ];
        }
        return response()->json($success, $this->successStatus);
    }
}
