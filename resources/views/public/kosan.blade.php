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
            <div class="col-lg-3">
                <div class="box-icon">
                    <div class="icon success">
                        <i class="fa fa-map-marker fa-2x"></i>
                    </div>
                    <p>
                        <span>Alamat</span>
                        <span>{{ $kosan->alamat }}</span>
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box-icon">
                    <div class="icon primary">
                        <i class="fa fa-tag fa-2x"></i>
                    </div>
                    <p>
                        <span>{{ $hargamax - $hargamin > 0 ? 'Kisaran' : '' }} Harga</span>
                        @if($hargamax - $hargamin > 0)
                        <span>Rp {{ $hargamin }} - Rp {{ $hargamax }}</span>
                        @else
                        <span>Rp {{ $hargamax }}</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box-icon">
                    <div class="icon warning">
                        <i class="fa fa-star fa-2x"></i>
                    </div>
                    <p>
                        <span>Difavoritkan sebanyak</span>
                        <span>{{ $favorit }}</span>
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box-icon">
                    <div class="icon success">
                        <i class="fa fa-home fa-2x"></i>
                    </div>
                    <p>
                        <span>Disewa sebanyak</span>
                        <span>45</span>
                    </p>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-lg-8">
                <div id="foto-kosan">
                    <img class="img-responsive" src="{{ asset('storage/'.$foto[0]->nama) }}"/>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-default panel-fasilitas">
                    <div class="panel-heading">
                        <h3 class="panel-title">Fasilitas Kosan</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>
                                <span>Akses 24 jam</span>
                                <span class="{{ $kosan->jammalam ? 'green' : 'red' }}">{{ $kosan->jammalam ? 'Ya' : 'Tidak' }}</span>
                            </li>
                            <li>
                                <span>Kamar mandi dalam</span>
                                <span class="{{ $kosan->kmdalam ? 'green' : 'red' }}">{{ $kosan->kmdalam ? 'Ya' : 'Tidak' }}</span>
                            </li>
                            <li>
                                <span>Tempat Parkir</span>
                                <span class="{{ $kosan->tempatparkir ? 'green' : 'red' }}">{{ $kosan->tempatparkir ? 'Ya' : 'Tidak' }}</span>
                            </li>
                            <li>
                                <span>Wifi</span>
                                <span class="{{ $kosan->wifi ? 'green' : 'red' }}">{{ $kosan->wifi ? 'Ya' : 'Tidak' }}</span>
                            </li>
                            <li>
                                <span>Dapur</span>
                                <span class="{{ $kosan->dapur ? 'green' : 'red' }}">{{ $kosan->dapur ? 'Ya' : 'Tidak' }}</span>
                            </li>
                            <li>
                                <span>Lemari Es</span>
                                <span class="{{ $kosan->lemaries ? 'green' : 'red' }}">{{ $kosan->lemaries ? 'Ya' : 'Tidak' }}</span>
                            </li>
                            <li>
                                <span>Televisi</span>
                                <span class="{{ $kosan->televisi ? 'green' : 'red' }}">{{ $kosan->televisi ? 'Ya' : 'Tidak' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <br/>

        <div class="bigtron" id="searchresult">
            <div class="row">
                <h3 style="padding:0 10px 10px;">Daftar Kamar yang Tersedia</h3>
                @foreach($kamar as $hasil)
                <div class="col-lg-3">
                    <div class="thumbnail">
                        <div class="image" style="background-image:url({{ asset('storage/' . $hasil->foto) }})"></div>
                        <div class="name">
                            <h3>{{ $hasil->nama }}</h3>
                            <p class="price">Rp {{ $hasil->harga }}</p>
                        </div>
                        <div class="detail">
                            <div class="top">
                                <p class="detail-item">
                                    kosan<br/>
                                    <b></b>
                                </p>
                                <p class="detail-item">
                                    jumlah kamar<br/>
                                    <b></b>
                                </p>
                            </div>
                            <div class="bottom">
                                <p class="detail-item">
                                    <span>AC</span>
                                    <span class="{{ $hasil->ac ? 'green' : 'red' }}">{{ $hasil->ac ? 'Ya' : 'Tidak' }}</span>
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
                            <a href="{{ route('lihat.kamar',[ 'id' => $hasil->id ]) }}">Lihat <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Keterangan</h3>
                    </div>

                    <div class="panel-body">
                        <?php echo $kosan->keterangan; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="panel panel-profile">
                    <div class="panel-heading">
                        <h3 class="panel-title">Info Pemilik Kosan</h3>
                    </div>

                    <div class="panel-body">
                        <img src="{{ asset('storage/' . $pemilik->avatar) }}" class="img-circle" style="width:100px;height:100px;margin:20px auto;display:block"/>
                        <h4 style="text-align:center">{{ $pemilik->displayname }}</h4>
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4">
                                <div class="line-round primary"></div>
                            </div>
                        </div>
                        <h5 style="text-align:center">Kontak</h5>
                        <ul>
                            <li>
                                <span>E-mail</span>
                                <span>{{ $pemilik->email }}</span>
                            </li>
                            <li>
                                <span>No. Telp</span>
                                <span>{{ $pemilik->telp }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('js/zoomove.min.js') }}"></script>
@endsection
