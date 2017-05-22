<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{

    protected $table = 'favorit';

    public $primaryKey = 'iduser';

    public $timestamps = false;

    protected $fillable = [
        'iduser','idkamarkosan'
    ];

}
