<?php

Route::get('/', 'HomePageController@HomePage')->name('homepage');

Route::get('cari/{latitude}/{longitude}/{namalokasi}', 'PublicPageController@CariKosan');

Route::get('kosan/{id}','PublicPageController@LihatKosan')->name('lihat.kosan');

Route::get('kamar/{id}','PublicPageController@LihatKamar')->name('lihat.kamar');

Route::post('sewa/kamar','PublicPageController@sewa')->name('sewa.kamar')->middleware(['auth','user']);

Route::post('sewa/tiket','PublicPageController@createTiket')->name('sewa.tiket');

Route::get('tiket/{kodetiket}','PublicPageController@lihatTiket')->name('lihat.tiket')->middleware('auth');

Route::post('verifikasi','RiwayatSewaController@verifikasi')->name('verifikasi.tiket');

Route::post('favorit','FavoritController@index')->name('favorit');

Auth::routes();

//Route::get('/user/{username}','');

// Halaman User

//Route::group(['middleware' => 'auth'], function () {
//
//    Route::get('/kosansaya', 'UserPageController@KosanSayaPage')->name('kosansaya');
//
//    Route::get('/riwayatsewa', function () {
//        return 'Riwayat sewa';
//    })->name('riwayat.sewa');
//
//});

Route::get('tes', function () {
    return \Bukosan\Model\RiwayatSewa::where('idkamar',10)->where('status','<>','SL')->count();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/user/{username}','');

// Halaman User

Route::group(['prefix' => 'upload'],function () {
    Route::post('images','ImageController@uploads')->name('upload.images');
    Route::post('image','ImageController@upload')->name('upload.image');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('pengaturan','UserPageController@SettingsPage')->name('settings');
    Route::post('pengaturan','SettingsController@process')->name('settings.process');
    Route::get('favorit','UserPageController@FavoritPage')->name('daftar.favorit');
    Route::group(['middleware' => 'user'], function(){
        Route::get('kosansaya', 'UserPageController@KosanSayaPage')->name('kosansaya');

        Route::get('riwayatsewa', 'UserPageController@RiwayatSewaPage')->name('riwayat.sewa');

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
});

Route::group(['prefix' => 'daftar'],function(){
    Route::get('kotakab/{namaprovinsi}','LocationController@DaftarKotaKab');
    Route::get('kecamatan/{namakotakab}','LocationController@DaftarKecamatan');
    Route::get('kelurahan/{namakecamatan}','LocationController@DaftarKelurahan');
});
