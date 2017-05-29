<?php

namespace Bukosan\Http\Controllers;

use Bukosan\Model\KamarKosan;
use Bukosan\Model\Kosan;
use Bukosan\User;
use Illuminate\Http\Request;
use Bukosan\Http\Controllers\Controller;

class AdminPageController extends Controller
{

    public function kelolaKosan()
    {
        return view('admin.kelolakosan', [
            'kosan' => Kosan::all()
        ]);
    }

    /**
     * Mengelola kamar dai kosan tertentu
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function kelolaKamar($id)
    {
        return view('admin.kelolakamar', [
            'kosan' => Kosan::find($id),
            'kamar' => KamarKosan::where('idkosan', $id)->get()
        ]);
    }

    public function kelolaUser()
    {
        return view('admin.kelolauser', [
            'users' => User::where('admin', false)->paginate(10)
        ]);
    }

}
