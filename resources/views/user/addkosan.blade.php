@extends('layouts.user.page')

@section('title')
    Kosan Saya
@endsection

@section('contents')

    <div class="panel panel-default panel-thumb">
        <div class="panel-heading">Daftar Kosan Baru</div>

        <div class="panel-body">
            <form action="{{ route('tambah.kosan') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Nama Kosan</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus>
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
                        <input id="alamat" type="text" class="form-control" name="alamat" required autofocus>
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
                        <input id="lantai" type="number" min="1" class="form-control" value="1" name="lantai" required autofocus>
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
                        <button class="btn btn-primary btn-chooser" data-input="#foto" type="button">Pilih Foto</button> Maksimal 4 Foto
                        <input id="foto" style="display:none" type="file" name="foto[]" multiple/>
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

                <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                    <label for="deskripsi" class="col-md-3 control-label">Tambahkan Deskripsi</label>
                    <div class="col-md-9">
                        <textarea id="deskripsi" name="deskripsi"></textarea>
                        @if ($errors->has('deskripsi'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary">Daftarkan Sekarang</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
