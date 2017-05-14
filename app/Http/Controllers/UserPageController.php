<?php

namespace Bukosan\Http\Controllers;

use Bukosan\Model\FotoKosan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Bukosan\Model\Kosan;
use Bukosan\Model\KamarKosan;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
{

    public function SettingsPage()
    {
        return view('user.setting');
    }

    public function KosanSayaPage(){
        $DaftarKosan = Kosan::where('idpemilik',Auth::user()->id)->get();
        $KosanCount = count($DaftarKosan);
        return view('user.kosansaya',[
            'DaftarKosan' => $DaftarKosan,
            'KosanCount' => $KosanCount
        ]);
    }

    public function DaftarKamarKosan($idkosan){
        return view('user.daftarkamar',[
            'kamar' => KamarKosan::where('idkosan',$idkosan)->get(),
            'kosan' => Kosan::where('id',$idkosan)->first()
        ]);
    }

    public function TambahKamarKosan($idkosan){
        return view('user.tambahkamar',[
            'kosan' => Kosan::where('id',$idkosan)->first()
        ]);
    }

    public function CreateKosanPage()
    {
        return view('user.addkosan');
    }

    public function EditKosanPage($idkosan){
        return view('user.addkosan',[
            'kosan' => Kosan::where('id',$idkosan)->first(),
            'foto' => DB::select('SELECT foto.nama FROM kosan, foto, foto_kosan WHERE foto.id = foto_kosan.idfoto AND kosan.id = foto_kosan.idkosan AND kosan.idpemilik = '. Auth::user()->id)
        ]);
    }

}
