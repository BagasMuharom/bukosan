@extends('layouts.app')

@section('title')
    Kosan ...
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/zoomove.min.css') }}">
    @endsection
@section('content')

    <div class="container">
        <h2>{{ $kosan->nama }}</h2>
        <div class="row">
            <div class="col-lg-8">
                <div id="foto-kosan">
                    <figure class="zoom-image zoo-item" data-zoo-image="{{ asset('storage/'.$foto->first()->nama) }}" data-zoo-scale="3" style="overflow: hidden;height:400px"></figure>
                </div>
            </div>

            <div class="col-lg-6">

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/zoomove.min.js') }}"></script>
@endsection
