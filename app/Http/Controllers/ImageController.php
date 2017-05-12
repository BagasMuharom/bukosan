<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    /**
     * Melakukan upload image dan mengirim daftar nama image dalam
     * bentuk JSON
     *
     * @param Request $request
     * @return string
     */
    public function upload(Request $request)
    {
        $images = [
            'fullurl' => [],
            'name' => []
        ];
        foreach ($request->images as $image){
            $imageName = time().''.$image->getClientOriginalName();
            # Menyimpan gambar secara public
            $image->storePubliclyAs('public',$imageName);
            # Menyimpan url gambar secara penuh
            array_push($images['fullurl'],asset('storage/'.$imageName));
            # Menyimpan nama gambar
            array_push($images['name'],$imageName);
        }
        return json_encode($images);
    }

}
