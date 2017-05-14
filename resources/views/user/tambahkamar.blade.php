@extends('layouts.user.page')

@section('title')
Kosan Saya
@endsection

@section('contents')

<?php

$editPage = (Route::current()->getName() == 'edit.kamar');

$nama = ($editPage) ? $kamar->nama : '';
$alamat = ($editPage) ? $kamar->alamat : '';
$lantai = ($editPage) ? $kamar->lantai : 1;
$harga = 0;

?>

<div class="panel panel-default panel-thumb">

    <div class="panel-heading">Tambah Kamar Baru</div>

    <div class="panel-body">

        <form action="{{ route('tambah.kamar') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

            {{ csrf_field() }}

            <input type="hidden" name="idkosan" value="{{ $kosan->id }}"/>

            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Nama Kamar</label>
                <div class="col-md-6">
                    <input id="name" type="text" value="{{ $nama }}" class="bukosan input-ui ui-primary" name="nama" placeholder="Nama Kamar" required autofocus>
                    @if ($errors->has('nama'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Harga Kamar</label>
                <div class="col-md-6">
                    <input id="name" type="number" value="{{ $harga }}" class="bukosan input-ui ui-primary" name="harga" min="0" placeholder="Harga Kamar" required>
                    @if ($errors->has('harga'))
                    <span class="help-block">
                        <strong>{{ $errors->first('harga') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('lantai') ? ' has-error' : '' }}">
                <label for="lantai" class="col-md-3 control-label">Terletak pada lantai</label>
                <div class="col-md-6">
                    <input type="hidden" name="lantai" id="lantai"/>
                    <div class="dropdown" target="#lantai" id="letaklantai-drop">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            Pilih Lantai
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                                for($i = 1;$i <= $kosan->jumlahlantai;$i++){
                             ?>
                            <li><a href="#" data-value="{{ $i }}">Lantai {{ $i }}</a></li>
                            <?php
                                }
                             ?>
                        </ul>
                    </div>
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
                    <div id="image-show">
                        @if(Route::current()->getName() == 'edit.kosan')
                            @foreach($foto as $gambar)
                        <img class="col-lg-3 img-responsive" src="{{ asset('storage/'.$gambar->nama) }}"/>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Fasilitas Kamar</h3>
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Lemari</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="lemari" id="lemari" value="0"/>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Kipas Angin</label>
                        <div class="col-md-6">
                            <input type="hidden" class="boolean-input" name="kipas" id="kipas" value="0"/>
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
            </div>

            <div class="panel-heading">
                <h3 class="panel-title">Tambahkan Deskripsi</h3>
            </div>

            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>Tambahkan deskripsi tentang kamar anda</h4>
                <p>Berikan penjelasan lebih tentang kamar anda, mungkin tentang fasilitas tambahan atau informasi tambahan lainnya tentang kamar kosan anda.</p>
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i>&nbsp;&nbsp;Tambahkan</button>
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
