<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth; 

class AuthController extends Controller
{
    public $successStatus = 200;

    public function login()
    { 
        try {
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
                $user = Auth::user(); 
                $data = [
                    // 'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'Role' => $user->rolse->name,
                    // 'blocked_at' => $user->blocked_at,
                    // 'created_at' => $user->created_at,
                    // 'updated_at' => $user->updated_at
                ];
                if($user->status != 1){
                    return response()->json(['error' => 'Sorry this user is blocked, Please contact administration.'], 400); 
                } 
                $success = [
                    'status' => true,
                    'message' => 'Login Successfully!'
                ];
                $objToken = $user->createToken('MyApp');
                $strToken = $objToken->accessToken;
                $expiration = $objToken->token->expires_at->diffInSeconds(Carbon::now());
                // $success['token'] = [
                //     "token_type" => "Bearer", 
                //     "expires_in" => $expiration, 
                //     "access_token" => $strToken
                // ];
                $success['token'] = $strToken;
                $success['data'] = $data;                
            } 
            else
            { 
                $success = [
                    'status' => false,
                    'message' => 'Sorry Invalid user name or password'
                ];
            } 
            return response()->json($success, $this->successStatus);
        }
        catch(Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }        
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->token()->revoke();
            $success = [
                'status' => true,
                'message' => 'You have been successfully logged out!'
            ];
            return response()->json($success, $this->successStatus);
        }
        catch(Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
