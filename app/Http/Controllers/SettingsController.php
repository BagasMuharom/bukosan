<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{

    /**
     * Melakukan update terhadap profil user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function __invoke(Request $request)
    {
        $user = $request->user();
        $user->username = $request->username;
        $user->save();
        return back();
    }

    /**
     * Melakukan validasi
     *
     * @param array $data
     * @return mixed
     */
    private function Validator(array $data){
        return Validator::make($data,[
            'username' => '',
            'name' => '',
            'email' => ''
        ]);
    }

}
