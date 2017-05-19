<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;

class KontakUser extends Model
{
    protected $table = 'kontak_user';

    public $timestamps = false;

    protected $fillable = [
        'id_kontak','id_user','isi'
    ];

    protected $primaryKey = 'id_kontak';

}
