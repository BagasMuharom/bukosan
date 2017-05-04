<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;

class UserPageController extends Controller
{

    public function SettingsPage()
    {
        return view('user.setting');
    }

    public function KosanSayaPage(){
        return view('user.kosansaya');
    }

    public function CreateKosanPage()
    {
        return view('user.addkosan');
    }

}
