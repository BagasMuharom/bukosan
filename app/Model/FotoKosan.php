<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FotoKosan extends Model
{

    public $timestamps = false;
    protected $table = 'foto_kosan';

    /**
     * Mendapatkan foto kosan
     *
     * @param $id
     * @return mixed
     */
    public static function get($id)
    {
        $foto = DB::table(DB::raw('foto as f, foto_kosan as fk, kosan as k'))
            ->whereRaw('fk.idfoto = f.id')
            ->whereRaw('k.id = fk.idkosan')
            ->whereRaw('k.id = ' . $id)
            ->select(DB::raw('f.nama as nama'));
        return $foto->get();
    }

}
