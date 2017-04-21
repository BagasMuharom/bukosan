<?php

namespace Bukosan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{

    /**
     * Untuk mengarahkan user ke halaman awal
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function HomePage()
    {
        return !Auth::check() ? $this->UserHomePage() : view('public.home');
    }

    /**
     * Menampilkan halaman awal untuk user yang sudah login
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function UserHomePage()
    {
        return view('user.home');
    }

}
