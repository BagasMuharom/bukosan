<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;

class RiwayatKunjungan extends Model
{

    public $timestamps = false;
    protected $table = 'riwayat_kunjungan';
    protected $primaryKey = 'iduser';

    protected $fillable = [
        'iduser','idkosan'
    ];

}
