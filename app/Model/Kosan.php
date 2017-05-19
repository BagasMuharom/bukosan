<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kosan extends Model
{

    protected $table = 'kosan';

    public $timestamps = false;

    public static function complete($latitude,$longitude){
        $kosan = DB::table(DB::raw('"kosan" as "k",
                                    "kamar_kosan" as "kk",( '.
                                    DB::table('kamar_kosan')
                                        ->select(DB::raw('max(harga) as max,min(harga) as min, idkosan'))
                                        ->groupBy('idkosan')->toSql() .') as harga , (' .
                                    DB::table(DB::raw('kosan, foto_kosan, foto'))
                                        ->whereRaw('foto.id = foto_kosan.idfoto')
                                        ->whereRaw('kosan.id = foto_kosan.idkosan')
                                        ->select(DB::raw('max(foto.nama) as nama'))
                                        ->toSql()
                                    . ') as foto'
                                    ))
                    ->where('k.terverifikasi',false)
                    ->whereRaw('"kk"."idkosan" = "k"."id"')
                    ->where('k.latitude','<=',$latitude + 5)
                    ->where('k.latitude','>=',$latitude - 5)
                    ->where('k.longitude','<=',$longitude + 5)
                    ->where('k.longitude','>=',$longitude - 5)
                    ->select('k.*',DB::raw('count("kk"."id") as "jumlahkamar", harga.min as hargamin, harga.max as hargamax, foto.nama as foto'))
                    ->distinct()
                    ->groupBy(DB::raw('k.id, harga.max, harga.min, foto.nama'))
                    ->get();

        return $kosan;
    }

}
