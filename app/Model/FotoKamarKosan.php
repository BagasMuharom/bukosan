<?php

namespace Bukosan\Model;

use Illuminate\Database\Eloquent\Model;
use Bukosan\Model\Foto;
use Illuminate\Support\Facades\Storage;

class FotoKamarKosan extends Model
{

    protected $table = 'foto_kamar_kosan';

    public $timestamps = false;
	
	public static function destroyFromSpecifiedKamar($id){
		$daftarfotokamar = static::where('idkamarkosan',$id);
		foreach($daftarfotokamar as $fotokamar){
			// Mendapatkan foto dari tabel Foto
			$foto = Foto::where('id',$fotokamar->idfoto);
			// Menghapus dari tabel foto_kamar_kosan
			$fotokamar->delete();
			// Menghapus file foto
			Storage::delete('public/' . $foto->nama);
			// Menghapus dari tabel Foto
			$foto->delete();
		}
	}

}
