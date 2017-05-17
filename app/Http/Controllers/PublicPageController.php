<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\Kosan;

class PublicPageController extends Controller
{

    public function CariKosan($latitude, $longitude, $lokasi)
    {
        return view('public.cari',[
            'kosan' => Kosan::where('latitude','<=',($latitude+5))->where('longitude','<=',($longitude+5))->get()
        ]);
    }

}
