@extends('layouts.user.page')

@section('title')
    Kosan Saya
@endsection

@section('contents')
    @if(count($kamar) == 0)
    <div class="panel panel-notif notif-lg row">
        <div class="notif-body col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <h3 class="notif-heading">Ups, Belum ada kamar dalam kosan ini</h3>
            <div class="notif-content">
                <p>Tambahkan kamar kosan anda sekarang dan dapatkan berbagai kemudahan !</p>
                <a href="{{ url('tambah/kamar/'.$kosan->id) }}" class="btn btn-primary">Tambah Kamar Sekarang</a>
            </div>
        </div>
        <div class="notif-icon col-lg-3 col-md-3 col-sm-3 hidden-xs">
            <img class="img-responsive" src="{{ asset('images/ava.jpg') }}"/>
        </div>
    </div>

    @else

    <div class="panel panel-default panel-thumb-list">
        <div class="panel-heading">
            <h2 class="panel-title">Kamar pada Kosan {{ $kosan->nama }}</h2>
            <div class="panel-tool">
                <a href="{{ route('tambah.kosan') }}" class="btn btn-primary">Tambah Kamar Baru</a>
            </div>
        </div>

        @foreach($kamar as $kamardetail)
        <div class="panel-body row">
            <div class="thumb-property">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <img src="{{ asset('images/ava.jpg') }}" class="img-responsive" alt=""/>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <div class="thumb-heading">
                            <h3 class="thumb-title">{{ $kamardetail->nama }}</h3>
                            <a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" class="btn btn-danger delete-kosan"><i class="fa fa-pencil"></i> Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
@endsection
