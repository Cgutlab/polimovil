<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    // protected $redirectTo = '/home';
    public function __construct()
    {
    	$this->middleware('guest:admin')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
    	return view('adm.auth.login');
    }

    public function auth(Request $request)
    {
      // Validate the form data
    	$this->validate($request, [
      		'username' => 'required',
      		'password' => 'required'
    	]);

      // Attempt to log the user in
    	if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => 'on'])) {
        // if successful, then redirect to their intended location
    		return redirect()->intended(route('adm.dashboard'));
    	}
      // if unsuccessful, then redirect back to the login with the form data
    	return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect()->route('adm.auth.login');
    }

}
