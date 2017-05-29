@extends('layouts.user.page')

@section('title')
    Kelola Kosan
@endsection

@section('contents')
    <h3>Kelola Kosan</h3>

    @foreach($kosan as $item)
        <p>{{ $item->nama }}</p>
        <a href="{{ route('kelola.kamar',['id' => $item->id]) }}">Kelola Kamar</a>
        <a href="{{ route('tangguhkan.kosan',['id' => $item->id]) }}">{{ $item->ditangguhkan ? 'Batalkan Penangguhan' : 'Tangguhkan' }}</a>
        @if(!$item->terverifikasi)
            <a href="{{ route('verifikasi.kosan',['id' => $item->id]) }}">Verifikasi</a>
        @endif
        <a href="{{ route('hapus.kosan',['id' => $item->id]) }}">Hapus</a>
    @endforeach

@endsection