<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;

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
    //protected $redirectTo = '/home';

    public function showLoginForm(){
        //Session::put('url.intended',URL::previous());
        return view('admin.auth.login');
    }

    protected function authenticated(Request $request, $user){
       // return $user;
        if($user->role==1){
            return redirect('admin/dashboard');
        }else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('login')->with('error', 'Your account deactivate by admin,Please contact Couponblast.deals');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
