<?php

return [

    'custom' => [
        // isi adalah pengganti dari email
        'isi' => [
            'required' => 'Email tidak boleh kosong !',
            'unique' => 'Alamat email telah dipakai !'
        ],
        'displayname' => [
            'required' => 'Nama lengkap tidak boleh kosong !'
        ],
        'username' => [
            'required' => 'Username tidak boleh kosong !',
        ],
        'alamat' => [
            'required' => 'Alamat tidak boleh kosong !',
            'min' => 'Alamat setidaknya 10 karakter'
        ],
        'deskripsi' => [
            'min' => 'Deskripsi minimal mengandung 100 karakter'
        ],
        'jeniskelamin' => [
            'required' => 'Jenis kelamin tidak boleh kosong !'
        ],
        'email' => [
            'required' => 'Email harus diisi !'
        ],
        'ava' => [
            'required' => 'Foto tidak boleh kosong !'
        ],
        'lantai' => [
            'required' => 'Pilih lokasi lantai kamar !'
        ]
    ]

];
