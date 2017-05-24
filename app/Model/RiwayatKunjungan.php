<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;

class RiwayatKunjungan extends Model
{

    protected $table = 'riwayat_kunjungan';

    public $timestamps = false;

    protected $fillable = [
        'iduser','idkosan'
    ];

}
