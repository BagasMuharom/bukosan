<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\Favorit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritController extends Controller
{

    public function index(Request $request){

        $id = $request->id;
        $user = Auth::user()->id;

        # Jika user pernah memfavoritkan kamar
        if(Favorit::where('iduser',$user)->where('idkamarkosan',$id)->count() > 0){
            return $this->delete($id,$user);
        }
        # Jika user belum pernah memfavoritkan kamar
        return $this->save($id,$user);
    }

    private function delete($idkamar,$iduser){
        $favorit = Favorit::where('iduser',$iduser)
                            ->where('idkamarkosan',$idkamar)
                            ->delete();
        return json_encode([
            'status' => 'deleted'
        ]);
    }

    private function save($idkamar,$iduser){
        Favorit::create([
            "iduser" => $iduser,
            "idkamarkosan" => $idkamar
        ]);
        return json_encode([
            "status" => "saved"
        ]);
    }

    public static function GetDaftarFavorit(){
        return DB::table(DB::raw('favorit as f, "user" as u, kamar_kosan as kk, foto, foto_kamar_kosan as fkk'))
                ->select(DB::raw('kk.*, min(foto.nama)'))
                ->whereRaw('f.iduser = u.id AND kk.id = fkk.idkamarkosan AND foto.id = fkk.idfoto AND u.id = ' . Auth::user()->id)
                ->groupBy(DB::raw('kk.id'))
                ->get();
    }

}
