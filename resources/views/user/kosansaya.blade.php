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

        <div class="pane panel-thumb-list">
            <div class="panel-heading">
                <h2 class="panel-title" style="font-size:25px">Kosan Saya</h2>
                <div class="panel-tool">
                    <a href="{{ route('tambah.kosan') }}" class="btn btn-primary">Daftarkan Kosan Baru</a>
                </div>
            </div>

            @foreach($DaftarKosan as $kosan)
                <div class="panel-body kosan-{{ $kosan->id }}">
                    <div class="thumb-property">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <img src="{{ asset('storage/' . $kosan->foto) }}" class="img-responsive" alt=""
                                     style="max-height:150px"/>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <div class="thumb-heading">
                                    <h3 class="thumb-title">{{ $kosan->nama }} <span class="badge">{{ $kosan->jumlahkamar }} kamar</span>
                                    </h3>
                                    <div class="thumb-info">
                                    @if($kosan->terverifikasi)
                                        <span class="label label-success">Terverifikasi</span>
                                    @else
                                        <span class="label label-danger">Belum Terverifikasi</span>
                                    @endif
                                    </div>
                                </div>
                                    <div style="padding:0 25px 0;">
                                        <a href="{{ route('daftar.kamar',['idkosan' => $kosan->id]) }}">Lihat daftar kamar</a>
                                            <div class="btn btn-group">
                                                <a href="{{ route('edit.kosan',['idkosan' => $kosan->id]) }}"
                                                   class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="{{ url('hapus/kosan') }}/{{ $kosan->id }}"
                                                   class="btn btn-danger delete-kosan" data-id="{{ $kosan->id }}"><i
                                                            class="fa fa-trash"></i> Hapus</a>
                                            </div>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
