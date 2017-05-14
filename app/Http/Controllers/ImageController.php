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
            // Menyimpan ke database
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

    public function SaveKosanImage($idKosan, array $ImageList){
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

    public function HapusFotoKosan($idkosan){
        $hapus = FotoKosan::where('idkosan',$idkosan)->delete();
    }

    public function HapusFotoKamarKosan($idkamar){
        $hapus = FotoKamarKosan::where('idkamarkosan',$idkamar)->delete();
    }

}
