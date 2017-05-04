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

    Route::get('/pengaturan','UserPageController@SettingsPage')->name('settings');

    Route::post('/pengaturan','SettingsController')->name('settings.process');

    Route::group(['prefix' => 'tambah'], function () {
        Route::get('kosan','UserPageController@CreateKosanPage')->name('tambah.kosan');
        Route::post('kosan','KosanController@store')->name('tambah.kosan');
        Route::get('kamar/{idkosan}', function ($idkosan) {
            return 'Tambah kamar kosan pada id : ' . $idkosan;
        });
    });

});
