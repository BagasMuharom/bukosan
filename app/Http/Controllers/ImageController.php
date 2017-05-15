<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\FotoKosan;
use Bukosan\Model\FotoKamarKosan;
use Bukosan\Model\Foto;

class ImageController extends Controller
{

    /**
     * Melakukan upload image dan mengirim daftar nama image dalam
     * bentuk JSON
     *
     * @param Request $request
     * @return string
     */
    public function upload(Request $request)
    {
        $images = [
            'fullurl' => [],
            'name' => []
        ];
        foreach ($request->images as $image){
            $imageName = time().''.$image->getClientOriginalName();
            # Menyimpan ke database
            $foto = new Foto();
            $foto->nama = $imageName;
            $foto->save();
            # Menyimpan gambar secara public
            $image->storePubliclyAs('public',$imageName);
            # Menyimpan url gambar secara penuh
            array_push($images['fullurl'],asset('storage/'.$imageName));
            # Menyimpan nama gambar
            array_push($images['name'],$imageName);
        }
        return json_encode($images);
    }

    public static function SaveKosanImage($idKosan, array $ImageList){
        foreach ($ImageList as $value) {
            $idfoto = Foto::all()->where('nama',$value)->first()->id;
            $fotokosan =  new FotoKosan();
            $fotokosan->setKeyName('idfoto');
            $fotokosan->idfoto = $idfoto;
            $fotokosan->idkosan = $idKosan;
            $fotokosan->save();
        }
    }

    public function SaveKamarKosanImage($idKamarKosan, array $ImageList){
        foreach ($ImageList as $value) {
            $idfoto = Foto::all()->where('nama',$value)->first()->id;
            $fotokamarkosan =  new FotoKamarKosan();
            $fotokamarkosan->setKeyName('idfoto');
            $fotokamarkosan->idfoto = $idfoto;
            $fotokamarkosan->idkamarkosan = $idKamarKosan;
            $fotokamarkosan->save();
        }
    }

    public static function HapusFotoKosan($idkosan){
        # Mendapatkan foto kosan
        $fotokosan = DB::table('foto_kosan')
                        ->join('foto','foto.id','=','foto_kosan.idfoto')
                        ->join('kosan','kosan.id','=','foto_kosan.idkosan')
                        ->select('foto.nama');
        foreach($fotokosan as $foto){
            # Menghapus dari storage
            Storage::delete('public/'.$foto->nama);
            # Menghapus foto dari database
            Foto::where('nama',$foto->nama)->delete();
        }
        # Menghapus dari tabel foto_kosan
        FotoKosan::where('idkosan',$idkosan)->delete();
    }

    public static function HapusFotoKamarKosan($idkamar){
        # Mendapatkan foto kamar kosan
        $fotokamar = DB::table('foto_kamar_kosan')
                        ->join('foto','foto.id','=','foto_kosan.idfoto')
                        ->join('kamar_kosan','kamar_kosan.id','=','foto_kosan.idkamarkosan')
                        ->select('foto.nama');
        foreach($fotokamar as $foto){
            # Menghapus dari storage
            Storage::delete('public/'.$foto->nama);
            # Menghapus foto dari database
            Foto::where('nama',$foto->nama)->delete();
        }
        # Menghapus foto dari tabel foto_kamar_kosan
        FotoKamarKosan::where('idkamarkosan',$idkamar)->delete();
    }

}
