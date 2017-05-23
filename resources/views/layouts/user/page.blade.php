@extends('layouts.app')

<?php

    $route = Route::currentRouteName();

    $isHomepage = ($route === 'homepage');

    $isKosanPage = ($route === 'tambah.kosan' || $route === 'kosansaya' || $route === 'edit.kosan');

    $isKamarPage = ($route === 'tambah.kamar' || $route === 'edit.kamar');

    $isSettingsPage = ($route === 'settings');

 ?>

@section('css')
    @if( Auth::check() )
    <link href="{{ asset('css/user.css') }}" rel="stylesheet"/>
    @endif
@endsection

@section('content')
        <nav class="navbar navbar-user">
            <div class="container">
                <ul id="stripped-menu">
                    <li @if($isHomepage) class="active" @endif><a href="{{ url('') }}">Beranda</a></li>
                    <li @if($isKosanPage) class="active" @endif><a href="{{ route('kosansaya') }}">Kosan Saya</a></li>
                    <li {{ Route::currentRouteName() == 'riwayat.sewa' ? 'class=active' : '' }}><a href="{{ route('riwayat.sewa') }}">Riwayat Sewa</a></li>
                    <li><a href="#">Notifikasi</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <aside class="col-lg-3 col-md-3 col-sm-4 col-xs-6" id="leftbar">
                    <div class="panel panel-default panel-avatar">
                        <div class="panel-body">
                            <img class="img-responsive img-circle img-ava" src="{{ asset('storage/' . Auth::user()->avatar) }}"/>
                            <h3>{{ Auth::user()->username }}</h3>
                        </div>
                    </div>

                    <nav id="side-menu">
                        <ul>
                            <li><a href="{{ route('daftar.favorit') }}"><i class="fa fa-star"></i>&nbsp;&nbsp;Favorit Saya</a></li>
                            <li @if($isSettingsPage) class="active" @endif><a href="{{ route('settings') }}"><i class="fa fa-gear"></i>&nbsp;&nbsp;Pengaturan</a></li>
                        </ul>
                    </nav>
                </aside>

                <div class="col-lg-9 col-md-9 col-sm-8">
                    @yield('contents')
                </div>
            </div>
        </div>
@endsection

@if(Auth::check())
    @section('js')
        <script src="{{ asset('js/jquery.form.js') }}"></script>
        <script src="{{ asset('js/user.js') }}"></script>
        @if($route === 'tambah.kosan' || $route === 'edit.kosan' || $route === 'tambah.kamar' || $route === 'edit.kamar')
        <script src="{{ asset('tinymce/tinymce.min.js')}}"></script>
        <script>
            tinymce.init({
                selector : '#deskripsi',
                menubar : false
            });
        </script>
        @endif
        @endsection
@endif
