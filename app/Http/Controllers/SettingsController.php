<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Bukosan\Model\KontakUser;
use Bukosan\Model\Kontak;

class SettingsController extends Controller
{

    /**
     * Melakukan update terhadap profil user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(Request $request)
    {
        if(!$this->Validator($request->toArray())->fails()){
            $user = $request->user();
            $user->username = $request->username;
            $user->displayname = $request->displayname;
            $user->nik = $request->nik;
            $user->tgl_lahir = $request->tanggallahir;
            $user->jenis_kelamin = $request->jeniskelamin;

            // Updating avatar
            $user->avatar = $request->ava;
            $user->email = $request->email;
            $user->telp = $request->telp;

            $user->save();
            return redirect()->back();
        }
        return redirect()->back()->withError($this->Validator($request->toArray()))->withInput();
    }

    /**
     * Melakukan validasi
     *
     * @param array $data
     * @return mixed
     */
    private function Validator(array $data){
        return Validator::make($data,[
            'username' => 'required|min:8|max:20',
            'displayname' => 'required|min:5',
            'telp' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required|max:1',
            'nik' => 'required',
            'email' => 'required|email',
            'telp' => 'required|numeric',
            'ava' => 'required'
        ]);
    }

}
