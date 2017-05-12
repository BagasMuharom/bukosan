@extends('layouts.user.page')

@section('title')
    Kosan Saya
@endsection

@section('contents')
    @if($KosanCount == 0)
    <div class="panel panel-notif notif-lg row">
        <div class="notif-body col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <h3 class="notif-heading">Tampaknya anda belum mendaftarkan kosan</h3>
            <div class="notif-content">
                <p>Daftarkan kosan anda sekarang dan dapatkan berbagai kemudahan !</p>
                <a href="{{ route('tambah.kosan') }}" class="btn btn-primary">Daftarkan Kosan Sekarang</a>
            </div>
        </div>
        <div class="notif-icon col-lg-3 col-md-3 col-sm-3 hidden-xs">
            <img class="img-responsive" src="{{ asset('images/ava.jpg') }}"/>
        </div>
    </div>

    @else

    <div class="panel panel-default panel-thumb-list">
        <div class="panel-heading">
            <h2 class="panel-title">Kosan Saya</h2>
            <div class="panel-tool">
                <a href="{{ route('tambah.kosan') }}" class="btn btn-primary">Daftarkan Kosan Baru</a>
            </div>
        </div>

        <div class="panel-body row">
            <div class="thumb-property">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <img src="{{ asset('images/ava.jpg') }}" class="img-responsive" alt=""/>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <h3 class="thumb-title">Kosan Bu Aya</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
