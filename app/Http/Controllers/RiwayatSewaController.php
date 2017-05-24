<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\RiwayatSewa;

class RiwayatSewaController extends Controller
{

    /**
     * Melakukan proses verifikasi penyewaan kosan
     *
     * @param $id
     */
    public function verifikasi(Request $request)
    {
        $riwayat = RiwayatSewa::where('kode',$request->kode)->first();
        $riwayat->status = 'SL';
        $riwayat->save();
        return redirect()->back();
    }

}
