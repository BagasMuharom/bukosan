<?php

use Illuminate\Http\Request;

Route::get('/', function (){
    return view('public.home')->with([
        "title" => "Beranda",
        "content" => "Ini beranda !"
    ]);
});
Route::get('/cari/{lokasi}',function ($lokasi){
    return 'Anda mencari kosan di daerah : ' . $lokasi;
});
Route::get('req',function (){
    return view('req');
});
Route::post('req',function (Request $request){
    return $request->nama;
});

Auth::routes();

Route::get('/home', 'HomeController@index');
