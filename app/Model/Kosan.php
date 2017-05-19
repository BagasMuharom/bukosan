<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kosan extends Model
{

    protected $table = 'kosan';

    public $timestamps = false;

    public static function complete($latitude,$longitude){
        $kosan = DB::table(DB::raw('"kosan" as "k", "kamar_kosan" as "kk"'))
                    ->where('k.terverifikasi',true)
                    ->whereRaw('"kk"."idkosan" = "k"."id"')
                    ->where('k.latitude','<=',$latitude+5)
                    ->where('k.longitude','<=',$longitude+5)
                    ->groupBy('k.id')
                    ->select('k.*',DB::raw('count("kk"."id") as "jumlahkamar"'))->get();

        return $kosan;
    }

    public static function AllFull($latitude,$longitude){
        $kosan = DB::select('SELECT
                            DISTINCT
                            	k.*,
                            	harga.min as hargamin,
                            	harga.max as hargamax,
                            	count(kk.id) as jumlahkamar,
                            	foto.nama as foto
                            FROM
                            	public.kosan as k,
                            	public.kamar_kosan as kk,
                            	(select
                            		max(harga) as max,
                            		min(harga) as min,
                            		idkosan
                            	from
                            		public.kamar_kosan
                            	group by
                            		idkosan) as harga,
                            	(select
                            		max(foto.nama) as nama
                            	from
                            		public.foto,
                            		public.foto_kosan,
                            		public.kosan
                            	where
                            		foto_kosan.idfoto = foto.id AND
                            		kosan.id = foto_kosan.idkosan
                            	GROUP BY
                            		kosan.id) as foto
                            WHERE
                            	k.terverifikasi = false AND
                            	kk.idkosan = k.id AND
                                k.latitude <= ' . ($latitude + 5) . ' AND
                                k.longitude <= ' . ($longitude + 5) . '
                            GROUP BY
                            	k.id,
                            	harga.max,
                            	harga.min,
                            	foto.nama');
        return $kosan;
    }

}
