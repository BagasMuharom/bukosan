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
        ]
    ]

];
