@extends('layouts.user.page')

@section('title')
    Kelola Kamar Kosan dari {{ $kosan->nama }}
@endsection

@section('contents')
    <h3>Kelola Kamar Kosan dari {{ $kosan->nama }}</h3>

    @foreach($kamar as $item)
        <p>{{ $item->nama }}</p>
        <a href="{{ route('tangguhkan.kamar',['id' => $item->id]) }}">{{ $item->ditangguhkan ? 'Batalkan Penangguhan' : 'Tangguhkan' }}</a>
        <a href="{{ route('hapus.kamar',['idkamar' => $item->id]) }}">Hapus</a>
    @endforeach

@endsection