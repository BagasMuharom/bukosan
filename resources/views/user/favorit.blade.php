@extends('layouts.user.page')

@section('title')
    Beranda
@endsection

@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Favorit Saya</h3>
        </div>

        <div class="panel-body">
            @foreach($favorit as $kamar)
                <p>{{ $kamar->nama }}</p>
            @endforeach
        </div>
    </div>
@endsection
