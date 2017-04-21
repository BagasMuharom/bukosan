<?php

namespace Bukosan;

use Illuminate\Database\Eloquent\Model;

class Kosan extends Model
{

    protected $table = "kosan";

    /**
     * Melakukan pencarian kosan ke database
     *
     * @param $location
     * @param array $facilities
     */
    public static function Search($location, array $facilities = [])
    {
        return Kosan::all();
    }

}
