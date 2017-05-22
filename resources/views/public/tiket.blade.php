@extends('layouts.app')

@section('title')
    Konfirmasi Penyewaan Kosan
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h2 style="text-align:center">Tiket Penyewaan Kosan</h2>
        <div class="panel panel-confirm">

            <div class="panel-body">
                @if(Auth::user()->id == $penyewa->id)
                <div class="alert alert-info">
                    <p>Pastikan anda datang ke kosan yang dituju maksimal 4 hari setelah tiket ini dibuat.</p>
                </div>
                <div class="row">
                    <div class="col-lg-2 line-round primary col-lg-offset-5"></div>
                </div>
                @endif
                <h3 style="text-align:center">Kode Tiket : <b>{{ $kode }}</b></h3>
                @if(Auth::user()->id == $pemilik->id)
                <div class="row">
                    <div class="col-lg-2 line-round primary col-lg-offset-5"></div>
                </div>
                <br/>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <img class="img-responsive" src="{{ asset('storage/' . $foto->nama) }}"/>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel-tiket">
                            <ul>
                                <li>
                                    <span>Tanggal Sewa</span>
                                    <span>{{ $tanggal['tanggal'] }} {{ $tanggal['bulan'] }} {{ $tanggal['tahun'] }}</span>
                                </li>
                                <li>
                                    <span>Nama penyewa</span>
                                    <span>{{ $penyewa->displayname }}</span>
                                </li>
                                <li>
                                    <span>Nama Kosan</span>
                                    <span>{{ $kosan->nama }}</span>
                                </li>
                                <li>
                                    <span>Alamat Kosan</span>
                                    <span>{{ $kosan->alamat }}, Kelurahan {{ $kosan->kelurahan }}, Kecamatan {{ $kosan->kecamatan }}, {{ $kosan->kotakab }}, {{ $kosan->provinsi }}</span>
                                </li>
                                <li>
                                    <span>Nama Kamar</span>
                                    <span>{{ $kamar->nama }}</span>
                                </li>
                                <li>
                                    <span>Nama Pemilik Kosan</span>
                                    <span>{{ $pemilik->displayname }}</span>
                                </li>
                                <li>
                                    <span>Harga Sewa Kamar</span>
                                    <span>Rp {{ $kamar->harga }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="alert alert-warning">
                            @if(Auth::user()->id == $penyewa->id)
                            <p>Tunjukkan tiket ini ke pemilik kosan untuk verifikasi</p>
                            @else
                            <p>Pastikan penyewa kosan menunjukkan tiket ini</p>
                            <p>Klik "Verifikasi" dibawah jika penyewa kosan telah datang ke kosan anda</p>
                            @endif
                        </div>
                        @if(Auth::user()->id == $pemilik->id)
                        <a href="{{ route('verifikasi.tiket',['kodetiket' => $kode ])}}" class="btn btn-success">Verifikasi Kedatangan Penyewa Kosan</a>
                        <form action="{{ route('verifikasi.tiket') }}" method="post">
                            <input type="hidden" name="kode" value="{{ $kode }}"/>
                            {{ csrf_field() }}
                        </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
