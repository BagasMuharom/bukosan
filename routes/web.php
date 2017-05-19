<?php

Route::get('/', 'HomePageController@HomePage')->name('homepage');

Route::get('cari/{latitude}/{longitude}/{namalokasi}', 'PublicPageController@CariKosan');

Route::get('kosan/{id}','PublicPageController@LihatKosan')->name('lihat.kosan');

Auth::routes();

Route::get('tes',function(){
    return \Bukosan\Model\Kosan::complete(5,5);
});

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
        Route::get('kamar/{idkosan}', 'UserPageController@TambahKamarKosan')->name('tambah.kamar');
        Route::post('kamar','KamarKosanController@store')->name('proses.tambah.kamar');
    });

    Route::group(['prefix' => 'edit'],function(){
        Route::get('kosan/{idkosan}','UserPageController@EditKosanPage')->name('edit.kosan');
        Route::post('kosan/{idkosan}','KosanController@update')->name('edit.kosan');
        Route::get('kamar/{idkamar}','UserPageController@EditKamar')->name('edit.kamar');
        Route::post('kamar/{idkamar}','KamarKosanController@update')->name('edit.kamar');
    });

    Route::group(['prefix' => 'hapus'],function(){
        Route::get('kosan/{idkosan}','KosanController@destroy')->name('hapus.kosan');
        Route::get('kamar/{idkamar}','KamarKosanController@destroy')->name('hapus.kamar');
        Route::post('foto','ImageController@HapusFoto')->name('hapus.foto');
    });

    Route::get('kosan/{idkosan}/kamar','UserPageController@DaftarKamarKosan')->name('daftar.kamar');

});

Route::group(['prefix' => 'daftar'],function(){
    Route::get('kotakab/{namaprovinsi}','LocationController@DaftarKotaKab');
    Route::get('kecamatan/{namakotakab}','LocationController@DaftarKecamatan');
    Route::get('kelurahan/{namakecamatan}','LocationController@DaftarKelurahan');
});
