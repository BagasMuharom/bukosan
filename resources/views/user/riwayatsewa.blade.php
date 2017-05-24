@extends('layouts.user.page')

@section('title')
    Beranda
@endsection

@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Riwayat Sewa Saya</h3>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Kode</td>
                        <td>Nama Kosan</td>
                        <td>Tanggal Sewa</td>
                        <td>Status</td>
                    </tr>
                    @foreach($sewa as $daftar)
                    <tr>
                        <td>{{ $daftar->kode }}&nbsp;&nbsp;<a href="{{ route('lihat.tiket',['idtiket' => $daftar->kode]) }}" class="btn btn-success btn-sm"><i class="fa fa-ticket"></i> Lihat Tiket <i class="fa fa-external-link"></i> </a></td>
                        <td>{{ $daftar->namakamar }}, {{ $daftar->namakosan }}</td>
                        <td>{{ $daftar->tanggal }}</td>
                        <td>{{ $daftar->status == 'MP' ? 'Menunggu Pembayaran' : 'Selesai' }}</td>
                    </tr>
                    @endforeach
                </thead>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Riwayat Sewa Kosan Saya</h3>
        </div>

        <div class="panel-body">
            <table class="table table-hover table-riwayat-sewa">
                <thead>
                    <tr>
                        <td><i class="fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;&nbsp;Kode</td>
                        <td><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Nama Kosan</td>
                        <td><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Sewa</td>
                        <td><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;Status</td>
                    </tr>
                    @foreach($disewakan as $daftar)
                    <tr>
                        <td><a href="{{ route('lihat.tiket',['idtiket' => $daftar->kode]) }}" target="_blank"> {{ $daftar->kode }}&nbsp;&nbsp; <i class="fa fa-external-link"></i></a></td>
                        <td>{{ $daftar->namakamar }}, {{ $daftar->namakosan }}</td>
                        <td>{{ $daftar->tanggal }}</td>
                        <td>{{ $daftar->status == 'MK' ? 'Menunggu Pembayaran' : 'Selesai' }}</td>
                    </tr>
                    @endforeach
                </thead>
            </table>
        </div>
    </div>
@endsection
