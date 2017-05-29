<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RiwayatSewa extends Model
{

    public $timestamps = false;
    protected $table = 'riwayat_sewa';
    protected $fillable = [
        'idkamar','harga','tanggal','idpenyewa','kode','status'
    ];

    public static function whereIDPemilik($id){
        return static::refind()
                        ->whereRaw('pemilik.id = ' . $id);
    }

    public static function refind()
    {
        return DB::table(DB::raw('"user" as penyewa, "user" as pemilik, riwayat_sewa as rs, kamar_kosan as km, kosan as ks'))
            ->select(DB::raw('rs.kode as kode, ks.nama as namakosan, km.nama as namakamar, rs.tanggal as tanggal, rs.status as status'))
            ->whereRaw('penyewa.id = rs.idpenyewa AND km.idkosan = ks.id AND ks.idpemilik = pemilik.id AND rs.idkamar = km.id');
    }

    public static function whereIDPenyewa($id){
        return static::refind()
                        ->whereRaw('penyewa.id = ' . $id);
    }

}
