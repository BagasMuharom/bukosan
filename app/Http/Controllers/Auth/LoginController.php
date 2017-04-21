<?php

namespace Bukosan\Http\Controllers\Auth;

use Bukosan\Http\Controllers\Controller;
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

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' => ['logout']]);
    }

    public function LoginPage()
    {
        return view('auth..login');
    }

    /**
     * Proses login user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function Process(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:10|min:5',
            'password' => 'required'
        ]);
        // Login menggunakan username dan password
//        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
//            return redirect(route('userhomepage'));
//        }
//        return redirect()->back();
    }

}
