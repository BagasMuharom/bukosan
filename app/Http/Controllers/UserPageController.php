<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\Kosan;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
{

    public function SettingsPage()
    {
        return view('user.setting');
    }

    public function KosanSayaPage(){
        $KosanCount = count(Kosan::where('id_pemilik',Auth::user()->id)->first());
        return view('user.kosansaya',[
            'KosanCount' => $KosanCount
        ]);
    }

    public function CreateKosanPage()
    {
        return view('user.addkosan');
    }

}
