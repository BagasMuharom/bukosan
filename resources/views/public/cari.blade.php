@extends('layouts.app')

@section('title')
Cari Kosan
@endsection

@section('content')
    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                </div>
            </div>
        </div>

        <div class="container">
        <div class="bigtron" id="searchresult">
            <div class="row">
                @foreach($kosan as $hasil)
                <div class="col-lg-3">
                    <div class="thumbnail">
                        <div class="image" style="background-image:url({{ asset('storage/' . $hasil->foto) }})"></div>
                        <div class="name">
                            <h3>{{ $hasil->nama }}</h3>
                            <p class="price">Rp {{ $hasil->hargamin }} - Rp {{ $hasil->hargamax }} / bln</p>
                        </div>
                        <div class="detail">
                            <div class="top">
                                <p class="detail-item">
                                    kosan<br/>
                                    <b>{{ $hasil->keluarga ? 'Keluarga' : $hasil->kosanperempuan ? 'Perempuan' : 'Laki-laki' }}</b>
                                </p>
                                <p class="detail-item">
                                    jumlah kamar<br/>
                                    <b>{{ $hasil->jumlahkamar }}</b>
                                </p>
                            </div>
                            <div class="bottom">
                                <p class="detail-item">
                                    <span>Akses 24 jam</span>
                                    <span class="{{ $hasil->jammalam ? 'green' : 'red' }}">{{ $hasil->jammalam ? 'Ya' : 'Tidak' }}</span>
                                </p>
                                <p class="detail-item">
                                    <span>Wifi</span>
                                    <span class="{{ $hasil->wifi ? 'green' : 'red' }}">{{ $hasil->wifi ? 'Ya' : 'Tidak' }}</span>
                                </p>
                                <p class="detail-item">
                                    <span>Tempat Parkir</span>
                                    <span class="{{ $hasil->tempatparkir ? 'green' : 'red' }}">{{ $hasil->tempatparkir ? 'Ya' : 'Tidak' }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <div class="dropup">
                                <button class="btn-circle" data-toggle="dropdown"><i class="fa fa-chevron-up"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <a href="{{ route('lihat.kosan',[ 'id' => $hasil->id ]) }}">Lihat <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </section>

@endsection
