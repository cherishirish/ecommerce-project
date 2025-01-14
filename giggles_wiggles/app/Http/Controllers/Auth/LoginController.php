<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Once authenticated, redirect to dashboard if admin, and profile if regular auth user
     *
     * @param Request $request
     * @param [type] $user
     * @return redirect
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->is_admin == 1){
            return redirect(route('admin.dashboard'))->with('success', 'You have successfully logged in');
        }else{
            return redirect(RouteServiceProvider::HOME)->with('success', 'You have successfully logged in');
        }
    }

    protected function loggedOut(Request $request)
    {
        $request->session()->flash('success', 'You have successfully logged out');
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
