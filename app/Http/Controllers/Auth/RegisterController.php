<?php

namespace Bukosan\Http\Controllers\Auth;

use Bukosan\User;
use Bukosan\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Bukosan\Model\KontakUser;
use Bukosan\Model\Kontak;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'nama' => 'required|max:255',
            'username' => 'required|max:25|unique:user',
            'isi' => 'required|unique:kontak_user|email|max:255',
            'password' => 'required|min:8|confirmed'
        ]);
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            // 'nik' => $data['nik'],
            'username' => $data['username'],
            'displayname' => $data['nama'],
            // 'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => str_random(10)
        ]);
    }

    protected function registered(Request $request, $user){
        KontakUser::create([
            'id_kontak' => Kontak::where('nama','email')->first()->id,
            'id_user' => $user->id,
            'isi' => $request->isi
        ]);
        return redirect()->route('homepage');
    }

}
