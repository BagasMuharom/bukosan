<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\Lokasi\Provinsi;
use Bukosan\Model\Lokasi\KotaKab;
use Bukosan\Model\Lokasi\Kecamatan;
use Bukosan\Model\Lokasi\Kelurahan;

class LocationController extends Controller
{

    public function DaftarKotaKab($namaprovinsi){
        $provinsi = Provinsi::where('nama',$namaprovinsi)->first();
        return KotaKab::where('idprovinsi',$provinsi->id)->get()->toJson();
    }

    public function DaftarKecamatan($namaKotaKab){
        $kotakab = KotaKab::where('nama',$namaKotaKab)->first();
        return Kecamatan::where('idkotakab',$kotakab->id)->get()->toJson();
    }

    public function DaftarKelurahan($namaKecamatan){
        $kecamatan = Kecamatan::where('nama',$namaKecamatan)->first();
        return Kelurahan::where('idkecamatan',$kecamatan->id)->get()->toJson();
    }

}
