<?php

namespace Bukosan;

use Illuminate\Database\Eloquent\Model;

class KamarKosan extends Model
{

    protected $table = 'kamar_kosan';

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
