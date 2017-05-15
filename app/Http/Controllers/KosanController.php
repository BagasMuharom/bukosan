<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers\ImageController;
use Bukosan\Model\Kosan;
use Illuminate\Support\Facades\Auth;
use DB;

class KosanController extends Controller
{

    /**
     * Menyimpan kosan ke dalam database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->manage($request, new Kosan());
    }

    /**
     * Mengambil data kosan dari database
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $kosan = DB::table('kosan')->query('SELECT * FROM "public"."kosan" as kosan, "public"."foto"');
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
        $kosan = Kosan::where('id',$id)->first();
        # Menghapus dulu gambar yang ada
        ImageController::HapusFotoKosan($id)
        $this->manage($request, $kosan);
    }

    public function manage(Request $request, Kosan $kosan){
        if(is_null($kosan->id))
            $kosan->idpemilik = Auth::user()->id;
        $kosan->nama = $request->name;
        $kosan->alamat = $request->alamat;
        $kosan->jumlahlantai = $request->lantai;
        $kosan->latitude = $request->latitude;
        $kosan->longitude = $request->longitude;
        $kosan->keterangan = $request->deskripsi;
        $kosan->terverifikasi = 0;

        # Fasilitas
        $kosan->wifi = $request->wifi;
        $kosan->dapur = $request->dapur;
        $kosan->jammalam = $request->jammalam;
        $kosan->kmdalam = $request->kmdalam;
        $kosan->tempatparkir = $request->tempatparkir;
        $kosan->lemaries = $request->lemaries;
        $kosan->televisi = $request->televisi;

        # Jenis kosan
        if($request->jeniskosan == 'keluarga')
            $kosan->keluarga = true;
        else {
            $kosan->keluarga = false;
            $kosan->kosanperempuan = ($request->jeniskelamin == 'L') ? false : true;
        }

        # simpan
        $kosan->save();

        # Menyimpan Gambar
        ImageController::SaveKosanImage($kosan->id,explode(',',$request->image));
    }

    /**
     * Menghapus kosan dari database
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         if(count(Kosan::where('id',$id)->get()) > 0){
             $kosan = Kosan::where('id',$id)->first();
             if($kosan->idpemilik == Auth::user()->id){
                 # Menghapus
                 $kosan->delete();
                 if(count(Kosan::where('id',$id)->get()) == 0){
                    ImageController::HapusFotoKosan($id);
                    # Mengirim status bahwa berhasil dihapus
                    return json_encode(['status' => 1]);
                 }
             }
         }
         # Mengirim status bahwa gagal dihapus
         return json_encode(['status' => 0]);
     }

     public static function GetFotoKosan($id){
        return DB::table('kosan')
                ->join('foto_kosan','foto_kosan.idkosan','=','kosan.id')
                ->join('foto','foto.id','=','foto_kosan.idfoto')
                ->where('kosan.id',$id);
     }
}
