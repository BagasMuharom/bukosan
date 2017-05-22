<?php

namespace Bukosan\Http\Controllers;

use Bukosan\Model\FotoKosan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Bukosan\Model\Kosan;
use Bukosan\Model\KamarKosan;
use Illuminate\Support\Facades\Auth;
use Bukosan\Model\Lokasi\Provinsi;
use Bukosan\Model\Lokasi\Kotakab;
use Bukosan\Model\Lokasi\Kecamatan;
use Bukosan\Model\Lokasi\Kelurahan;
use Bukosan\Model\RiwayatSewa;

class UserPageController extends Controller
{

    public function SettingsPage()
    {
        return view('user.setting');
    }

    public function KosanSayaPage(){
        $DaftarKosan = Kosan::where('idpemilik',Auth::user()->id)->orderBy('id')->get();
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
            'kosan' => Kosan::where('id',$idkosan)->first(),
            'kamar' => new KamarKosan()
        ]);
    }

    public function CreateKosanPage()
    {
        return view('user.addkosan',[
            'provinsi' => Provinsi::all(),
            'kosan' => new Kosan()
        ]);
    }

    public function EditKamar($idkamar){
        return view('user.tambahkamar',[
            'kamar' => KamarKosan::find($idkamar),
            'kosan' => Kosan::find(KamarKosan::find($idkamar)->idkosan),
            'foto' => DB::table('foto')
                        ->join('foto_kamar_kosan','foto.id','=','foto_kamar_kosan.idfoto')
                        ->join('kamar_kosan','kamar_kosan.id','=','foto_kamar_kosan.idkamarkosan')
                        ->where('kamar_kosan.id',$idkamar)
                        ->select('foto.nama as nama')
                        ->get()
        ]);
    }

    public function EditKosanPage($idkosan){
        $kosan = DB::table('kosan')
                        ->join('kelurahan','kosan.kelurahan','=','kelurahan.id')
                        ->join('kecamatan','kelurahan.idkecamatan','=','kecamatan.id')
                        ->join('kotakab','kecamatan.idkotakab','=','kotakab.id')
                        ->join('provinsi','kotakab.idprovinsi','=','provinsi.id')
                        ->where('kosan.id',$idkosan)
                        ->select('kosan.*','kelurahan.nama as kelurahan','kecamatan.nama as kecamatan','provinsi.nama as provinsi','kotakab.nama as kotakab','provinsi.id as idprovinsi','kotakab.id as idkotakab','kecamatan.id as idkecamatan')
                        ->first();
        return view('user.addkosan',[
            'kosan' => $kosan ,
            'provinsi' => Provinsi::all(),
            'kotakab' => Kotakab::where('idprovinsi',$kosan->idprovinsi)->get(),
            'kecamatan' => kecamatan::where('idkotakab',$kosan->idkotakab)->get(),
            'kelurahan' => Kelurahan::where('idkecamatan',$kosan->idkecamatan)->get(),
            'foto' => DB::select('SELECT foto.nama FROM kosan, foto, foto_kosan WHERE foto.id = foto_kosan.idfoto AND kosan.id = foto_kosan.idkosan AND kosan.id = ' . $idkosan)
        ]);
    }

    public function RiwayatSewaPage(){
        $daftarKosan = Kosan::where('idpemilik',Auth::user()->idpemilik)->pluck('id');
        $daftarKamar = KamarKosan::whereIn('idkosan',$daftarKosan)->pluck('id');
        return view('user.riwayatsewa',[
            'sewa' => RiwayatSewa::whereIDPenyewa(Auth::user()->id)->get(),
            'disewakan' => RiwayatSewa::whereIDPemilik(Auth::user()->id)->get()
        ]);
    }

}
