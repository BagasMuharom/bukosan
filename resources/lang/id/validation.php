<?php

return [

    'custom' => [
        'email' => [
            'required' => 'Email tidak boleh kosong !',
        ],
        'fullname' => [
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
