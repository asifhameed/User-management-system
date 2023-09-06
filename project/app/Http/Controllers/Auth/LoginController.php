<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Role_permissions_assign;

use View;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    // use AuthenticatesUsers;
    use AuthenticatesUsers {
        logout as performLogout;
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public $data = array();
    protected $file_path = "";
    protected $route_path = "login";
    protected $home_path = "login";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->data['title'] = 'Login';
        $this->data['singulartitle'] = 'login';
        $this->data['slug'] = 'login';
        $this->file_path = 'auth';
        View::share('route_path', $this->route_path);
        View::share('home_path', $this->home_path);
    }

    public function login(Request $request)
    {
        $validation = Validator::make( $request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        $validation->validate();

        $user = User::Where('email', $request->email)->first();
        if($user != null)
        {
            if( $user && $user->status != 1){
                return redirect()->back()->with('error','Sorry this user is blocked, Please contact administration.');
            }
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            // Make sessions all users permissions.
            $permissions = Role_permissions_assign::where('role_id_fk',$user->role_id_fk)->get();
            $userPermissions = array();
            foreach($permissions as $permission){
                $userPermissions[$permission->section_id_fk] = explode(',', $permission->permission_names);
            }
            session(['userPermissions' => $userPermissions]);
            
            // return redirect()->intended('dashboard')->withSuccess('Signed in');
            return redirect()->intended('users')->withSuccess('Signed in');
        }

        

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    // protected function guard()
    // {
    //     return Auth::guard('admin');
    // }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        
        return redirect()->route('login')->with('success', 'You are logged out successfully.');
    }
}
