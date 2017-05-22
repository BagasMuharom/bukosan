<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Bukosan\Model\Favorit;
use Illuminate\Support\Facades\Auth;

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

}
