<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\KamarKosan;
use Bukosan\Model\Kosan;
use Bukosan\Model\Foto;
use Bukosan\Model\FotoKamarKosan;
use Illuminate\Support\Facades\Validator;
use Bukosan\Http\Controllers\ImageController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Bukosan\User;
use Bukosan\Model\RiwayatSewa;

class KamarKosanController extends Controller
{

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        if(!$this->ValidasiKamarKosan($request)->fails()){
            $this->manage($request,new KamarKosan());
            return redirect()->route('daftar.kamar',['idkosan' => $request->idkosan]);
        }
        else{
            return redirect()->back()->withInput()->withError();
        }
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        if(!$this->ValidasiKamarKosan($request)->fails()){
            $kamar = KamarKosan::find($id);
            ImageController::HapusFotoKamarKosan($id,false);
            $this->manage($request,$kamar);
            return redirect()->route('daftar.kamar',['idkosan' => $request->idkosan]);
        }
        else{
            return redirect()->back()->withInput()->withError();
        }
    }

    private function manage(Request $request,KamarKosan $kamar){
        $kamar->nama = $request->nama;
        $kamar->harga = $request->harga;
        $kamar->keterangan = $request->deskripsi;
        $kamar->letaklantai = $request->lantai;
        $kamar->idkosan = $request->idkosan;

        // Fasilitas
        $kamar->ac = $request->ac;
        $kamar->kipasangin = $request->kipas;
        $kamar->lemari = $request->lemari;

        $kamar->save();

        // Menambah Gambar
        ImageController::SaveKamarKosanImage($kamar->id,explode(',',$request->image));
    }

    private function ValidasiKamarKosan(Request $request){
        $validate = '';
        return Validator::make($request->toArray(),[
            'nama' => 'required',
            'harga' => 'required|numeric',
            'lantai' => 'required',
            'image' => 'required',
            'deskripsi' => 'required'
        ]);
    }

    /**
    * Menghapus kosan dari database
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $kamarkosan = KamarKosan::find($id);
        if(!is_null($kamarkosan)){
            $kosan = Kosan::where('id',$kamarkosan->idkosan)->first();
            if($kosan->idpemilik == Auth::user()->id){
                # Menghapus
                if(RiwayatSewa::where('idkamar',$id)->where('status','<>','SL')->count() > 0)
                    return json_encode(['status' => 0]);
                else{
                    ImageController::HapusFotoKamarKosan($id);
                    $kamarkosan->delete();
                    # Mengirim status bahwa berhasil dihapus
                    return json_encode(['status' => 1]);
                }
            }
        }
        # Mengirim status bahwa gagal dihapus
        return json_encode(['status' => 0]);
    }

    public static function GetFotoKamarKosan($id){
        return DB::table('kamar_kosan')
        ->join('foto_kamar_kosan','foto_kamar_kosan.idkamarkosan','=','kamar_kosan.id')
        ->join('foto','foto.id','=','foto_kamar_kosan.idfoto')
        ->where('kamar_kosan.id',$id)
        ->where('kamar_kosan.id',$id);
    }

    public static function sewa(Request $request){
        $kamar = KamarKosan::find($request->id);
        $kosan = Kosan::withAddress($kamar->idkosan)->first();
        return RiwayatSewa::create([
            'tanggal' => date('Y-m-d'),
            'idkamar' => $kamar->id,
            'harga' => $kamar->harga,
            'idpenyewa' => Auth::user()->id,
            'status' => 'MP',
            'tersedia' => false,
            'kode' => str_random(8)
        ]);
    }

}
