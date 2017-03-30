<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    public function LoginPage()
    {
        return view('login');
    }

    public function LoginProcess(Request $request)
    {
        if(Auth::attempt(['name' => $request->username, 'password' => $request->password])){
            echo 'Berhasil Login';
        }
        else{
            echo 'Gagal Login';
        }
    }

}
