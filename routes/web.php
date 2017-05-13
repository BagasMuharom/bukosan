<?php

Route::get('/', 'HomePageController@HomePage')->name('homepage');

Route::get('/cari/{lokasi}', function ($lokasi) {
    return 'Anda mencari kosan di daerah : ' . $lokasi;
});

Route::get('/home', 'HomeController@index');

Route::get('input', function () {
    return view('test.input');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/user/{username}','');

// Halaman User

Route::group(['middleware' => 'auth'], function () {

    Route::get('/kosansaya', 'UserPageController@KosanSayaPage')->name('kosansaya');

    Route::get('/riwayatsewa', function () {
        return 'Riwayat sewa';
    })->name('riwayat.sewa');

});

Route::get('input', function () {
    return view('test.input');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/user/{username}','');

// Halaman User

Route::group(['prefix' => 'upload'],function () {
    Route::post('images','ImageController@upload')->name('upload.images');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/kosansaya', 'UserPageController@KosanSayaPage')->name('kosansaya');

    Route::get('/riwayatsewa', function () {
        return 'Riwayat sewa';
    })->name('riwayat.sewa');

    Route::get('/pengaturan','UserPageController@SettingsPage')->name('settings');

    Route::post('/pengaturan','SettingsController')->name('settings.process');

    Route::group(['prefix' => 'tambah'], function () {
        Route::get('kosan','UserPageController@CreateKosanPage')->name('tambah.kosan');
        Route::post('kosan','KosanController@store')->name('tambah.kosan');
        Route::get('kamar/{idkosan}', function ($idkosan) {
            return 'Tambah kamar kosan pada id : ' . $idkosan;
        });
    });

    Route::group(['prefix' => 'edit'],function(){
        Route::get('kosan/{idkosan}','UserPageController@EditKosanPage')->name('edit.kosan');
        Route::post('kosan','KosanController@edit')->name('edit.kosan');
    });

    Route::group(['prefix' => 'hapus'],function(){
        Route::get('kosan/{idkosan}','KosanController@destroy')->name('hapus.kosan');
    });

    Route::get('kosan/{idkosan}/kamar','UserPageController@DaftarKamarKosan');

});

Route::get('tes',function(){
    return \Bukosan\Model\Kosan::where('idpemilik',Auth::user()->id)->get();
});
