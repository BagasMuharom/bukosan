@extends('layouts.user.page')

@section('title')
Kosan Saya
@endsection

@section('contents')

<div class="panel panel-default panel-thumb">
    <div class="panel-heading">Daftar Kosan Baru</div>

    <div class="panel-body">

        <div class="alert alert-warning">
            <p>Ingat, pendaftaran ini adalah untuk pendaftaran kosan anda secara umum, bukan merupakan pendaftaran dari kamar yang ada pada kosan anda. Butuh bantuan ? Silahkan hubungi Customer Service kami</p>
            <button type="button" class="btn btn-warning close" aria-label="Close"><span aria-hidden="true">Ya, saya mengerti !</span></button>
        </div>

        <form action="{{ route('tambah.kosan') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Nama Kosan</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="bukosan input-ui ui-primary" name="name" placeholder="Nama Kosan" required autofocus>
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                <label for="alamat" class="col-md-3 control-label">Alamat</label>
                <div class="col-md-6">
                    <input id="alamat" type="text" class="bukosan input-ui ui-primary" name="alamat" required>
                    @if ($errors->has('alamat'))
                    <span class="help-block">
                        <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('lantai') ? ' has-error' : '' }}">
                <label for="lantai" class="col-md-3 control-label">Jumlah lantai</label>
                <div class="col-md-6">
                    <input placeholder="Jumlah lantai" id="lantai" type="number" min="1" class="bukosan input-ui ui-primary" value="1" name="lantai" required>
                    @if ($errors->has('lantai'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lantai') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="foto" class="col-md-3 control-label">Foto</label>
                <div class="col-md-6">
                    <input type="hidden" name="image" id="image"/>
                    <button class="btn btn-primary btn-chooser" data-input="#foto" type="button">Pilih Foto</button> Maksimal 4 Foto
                    <div id="image-show"></div>
                </div>
            </div>

            <div class="form-group{{ $errors->has('koordinat') ? ' has-error' : '' }}">
                <label for="koordinat" class="col-md-3 control-label">Lokasi Kosan Pada Map</label>
                <div class="col-md-9">
                    <input type="hidden" id="latitude" name="latitude" value="-7.557"/>
                    <input type="hidden" id="longitude" name="longitude" value="131.13"/>
                    <div id="map" style="width:100%;height:250px"></div>
                    @if ($errors->has('koordinat'))
                    <span class="help-block">
                        <strong>{{ $errors->first('koordinat') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Fasilitas Kosan</h3>
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Wi-fi</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="wifi" id="wifi" value="0"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Kamar mandi dalam</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="kmdalam" id="kmdalam" value="0"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Akses 24 jam</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="jammalam" id="jammalam" value="0"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">AC</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="ac" id="ac" value="0"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Tempat Parkir</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="tempatparkir" id="tempatparkir" value="0"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Dapur</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="dapur" id="dapur" value="0"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Lemari es</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="lmearies" id="lemaries" value="0"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Televisi</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="televisi" id="televisi" value="0"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Jenis Penyewa Kosan</h3>
            </div>

            <div class="form-group">
                <label for="jeniskelamin" class="col-md-3 control-label">Jenis Kelamin Penyewa</label>
                <div class="col-md-6">
                    <input type="hidden" name="jeniskelamin" id="jeniskelamin"/>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="jeniskelamin-drop" data-toggle="dropdown">
                            Pilih Jenis Kelamin
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Laki-laki</a></li>
                            <li><a href="#">Perempuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="kategori" class="col-md-3 control-label">Kategori Penyewa</label>
                <div class="col-md-6">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="jenispenyewa-drop" data-toggle="dropdown">
                            Jenis Penyewa
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Perorangan/Pelajar</a></li>
                            <li><a href="#">Keluarga</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Tambahkan Deskripsi</h3>
            </div>

            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>Tambahkan deskripsi tentang kosan anda</h4>
                <p>Berikan penjelasan lebih tentang kosan anda, mungkin tentang peraturan kosan atau informasi tambahan lainnya tentang kosan anda.</p>
            </div>

            <textarea id="deskripsi" name="deskripsi"></textarea>
            @if ($errors->has('deskripsi'))
            <span class="help-block">
                <strong>{{ $errors->first('deskripsi') }}</strong>
            </span>
            @endif
            <br/>

            <div class="form-group">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i>&nbsp;&nbsp;Daftarkan Sekarang</button>
                </div>
            </div>

        </form>

        <form class="file-upload" action="{{ route('upload.images') }}" method="post" enctype="multipart/form-data" style="display: none">
            {{ csrf_field() }}
            <input type="file" name="images[]" id="foto" multiple/>
        </form>
    </div>
</div>
@endsection
