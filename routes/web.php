<?php

use Illuminate\Http\Request;

Route::get('/', 'HomePageController@HomePage');

Route::get('/cari/{lokasi}',function ($lokasi){
    return 'Anda mencari kosan di daerah : ' . $lokasi;
});

Route::get('req',function (){
    return view('req');
});

Route::post('req',function (Request $request){
    return $request->nama;
});

Route::get('masuk','Auth\LoginController@LoginPage')->name('login');
Route::post('masuk','Auth\LoginController@Process');

Route::get('daftar','Auth\RegisterController@RegisterPage')->name('register');

//Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('input', function(){
    return view('test.input');
});

Route::get('bla',function (){
    return 'Hello !';
});