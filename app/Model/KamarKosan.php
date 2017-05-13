<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;

class KamarKosan extends Model
{

    protected $table = 'kamar_kosan';

    public $timestamps = false;

    /**
     * @param null $location
     * @param array $facilities
     * @param Kosan|null $kosan
     */
    public static function Search($location = null, array $facilities = [],Kosan $kosan = null)
    {
        //
    }

}
