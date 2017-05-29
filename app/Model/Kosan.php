<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kosan extends Model
{

    public $timestamps = false;
    protected $table = 'kosan';

    public static function fromLocation($latitude, $longitude)
    {
        $kosan = static::refind()
            ->where('k.terverifikasi', false)
            ->whereRaw('"kk"."idkosan" = "k"."id"')
            ->where('k.latitude', '<=', $latitude + 5)
            ->where('k.latitude', '>=', $latitude - 5)
            ->where('k.longitude', '<=', $longitude + 5)
            ->where('k.longitude', '>=', $longitude - 5);
        return static::render($kosan);
    }

    public static function refind(){
        $kosan = DB::table(DB::raw('"kosan" as "k",
                                    "kamar_kosan" as "kk",( '.
                                    DB::table('kamar_kosan')
                                        ->select(DB::raw('max(harga) as max,min(harga) as min, idkosan'))
                                        ->groupBy('idkosan')->toSql() .') as harga , (' .
                                    DB::table(DB::raw('kosan, foto_kosan, foto'))
                                        ->whereRaw('foto.id = foto_kosan.idfoto')
                                        ->whereRaw('kosan.id = foto_kosan.idkosan')
                                        ->select(DB::raw('min(foto.nama) as nama, kosan.id as idkosan'))
                                        ->groupBy(DB::raw('kosan.id'))
                                        ->toSql()
                                    . ') as foto'
        ))
            ->whereRaw('kk.idkosan = k.id')
            ->whereRaw('k.id = foto.idkosan')
            ->whereRaw('harga.idkosan = k.id');
        return $kosan;
    }

    public static function render($kosan){
        return $kosan
                ->select('k.*',DB::raw('count("kk"."id") as "jumlahkamar", harga.min as hargamin, harga.max as hargamax, foto.nama as foto'))
                ->distinct()
                ->groupBy(DB::raw('k.id, harga.max, harga.min, foto.nama'));
    }

    public static function whereId($id)
    {
        $kosan = static::refind()
            ->where('id', '=', $id);
        return static::render($kosan)
            ->get();
    }

    public static function withAddress($id = null)
    {
        $where = 'ks.kelurahan = kl.id AND kl.idkecamatan = kc.id AND kc.idkotakab = k.id AND k.idprovinsi = p.id';
        $kosan = DB::table(DB::raw('kosan as ks, provinsi as p, kotakab as k, kecamatan as kc, kelurahan as kl'))
            ->select(DB::raw('ks.*, p.nama as provinsi, k.nama as kotakab, kc.nama as kecamatan, kl.nama as kelurahan'));
        if (!is_null($id)) {
            $where .= ' AND ks.id = ' . $id;
        }
        $kosan->whereRaw($where);
        return $kosan;
    }

    public static function getJumlahFavorit($id)
    {
        $fav = DB::table(DB::raw('kosan k, (' .
            DB::table(DB::raw('kamar_kosan as kk, favorit as f'))
                ->select(DB::raw('kk.idkosan, kk.id, count(f) as jumlah'))
                ->whereRaw('f.idkamarkosan = kk.id')
                ->groupBy(DB::raw('kk.id'))
                ->toSql()
            . ') as fav'))
            ->select(DB::raw(' k.id, sum(fav.jumlah) as jumlah'))
            ->whereRaw('fav.idkosan = ' . $id)
            ->groupBy(DB::raw('k.id'));
        if (count($fav->get()) > 0) {
            return $fav->first()->jumlah;
        } else {
            return 0;
        }
    }

    public static function getJumlahSewa($id)
    {

    }

}
