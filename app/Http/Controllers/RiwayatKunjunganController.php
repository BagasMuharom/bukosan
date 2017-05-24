<?php

namespace Bukosan\Http\Controllers;

use Bukosan\Model\RiwayatKunjungan;
use Illuminate\Support\Facades\Auth;

class RiwayatKunjunganController extends Controller
{

    /**
     * Menambah ke riwayat kunjungan
     *
     * @param $idkosan
     */
    public static function tambah($idkosan)
    {
        if(is_null(RiwayatKunjungan::where('iduser',Auth::user()->id)->where('idkosan',$idkosan)->first())){
            RiwayatKunjungan::create([
                "iduser" => Auth::user()->id,
                "idkosan" => $idkosan
            ]);
        }
    }

}
