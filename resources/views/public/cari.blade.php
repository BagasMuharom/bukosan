@extends('layouts.app')

@section('title')
Cari Kosan
@endsection

@section('content')
    @foreach($kosan as $hasil)
        <h3>{{ $hasil->nama }}</h3>
    @endforeach
@endsection