<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\KamarKosan;

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
        $kamar = new KamarKosan();
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
        $image = new ImageController();
        $image->SaveKamarKosanImage($kamar->id,explode(',',$request->image));
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
        $request->all();
        //$kosan = Kosan::find($id)->first();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
