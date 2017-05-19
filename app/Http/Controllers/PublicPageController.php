<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\Kosan;
use Bukosan\Http\Controllers\KosanController;

class PublicPageController extends Controller
{

    public function CariKosan($latitude, $longitude, $lokasi)
    {
        return view('public.cari',[
            'kosan' => Kosan::AllFull($latitude,$longitude),
        ]);
    }

    public function LihatKosan($idkosan){
        return view('public.kosan',[
            'kosan' => Kosan::find($idkosan),
            'foto' => KosanController::GetFotoKosan($idkosan)
        ]);
    }

}
