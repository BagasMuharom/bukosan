<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\RiwayatSewa;

class TiketController extends Controller
{

    public function verifikasi(Request $request)
    {
        $kodetiket = $request->kode;
        $tiket = RiwayatSewa::where('kode',$kodetiket)->first();
        $tiket->status = 'SL';
        $tiket->save();
        return redirect()->back();
    }

}
