@extends('layouts.user.page')

@section('title')
    Pengaturan
@endsection

@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">Pengaturan</div>

        <div class="panel-body">
            @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <form id="settings-form" class="form-horizontal" action="{{ route('settings.process') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('displayname') ? ' has-error' : '' }}">
                    <label for="displayname" class="col-md-3 control-label">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input id="displayname" type="text" class="form-control" name="displayname"
                               value="{{ count($errors) > 0 ? old('displayname') : Auth::user()->displayname }}" required autofocus>

                        @if ($errors->has('displayname'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('displayname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                    <label for="nik" class="col-md-3 control-label">NIK</label>
                    <div class="col-md-6">
                        <input id="nik" type="text" class="form-control" name="nik"
                               value="{{ count($errors) > 0 ? old('nik') : Auth::user()->nik }}" required autofocus>

                        @if ($errors->has('nik'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-3 control-label">Username</label>
                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username"
                               value="{{ count($errors) > 0 ? old('username') : Auth::user()->username }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tanggallahir') ? ' has-error' : '' }}">
                    <label for="tanggallahir" class="col-md-3 control-label">Tanggal Lahir</label>
                    <div class="col-md-6">
                        <input id="tanggallahir" type="date" class="form-control" name="tanggallahir"
                               value="{{ count($errors) > 0 ? old('tanggallahir') :  Auth::user()->tgl_lahir }}" required autofocus>

                        @if ($errors->has('tanggallahir'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('tanggallahir') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                    <label for="jeniskelamin" class="col-md-3 control-label">Jenis Kelamin</label>
                    <div class="col-md-6">
                        <input id="jeniskelamin" type="hidden" class="form-control" name="jeniskelamin"
                               value="{{ count($errors) > 0 ? old('jeniskelamin') :  Auth::user()->jenis_kelamin }}" required autofocus>
                               <div class="dropdown" target="#jeniskelamin" id="jeniskelamin-drop">
                                   <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                       @if((count($errors) > 0 && old('jeniskelamin') == 'L') ||
                                            Auth::user()->jenis_kelamin == 'L')
                                            Laki-Laki
                                        @elseif((count($errors) > 0 && old('jeniskelamin') == 'P') ||
                                             Auth::user()->jenis_kelamin == 'P')
                                             Perempuan
                                        @else
                                        Pilih Jenis kelamin
                                        @endif
                                       <span class="caret"></span>
                                   </button>
                                   <ul class="dropdown-menu">
                                       <li><a href="#" data-value="L">Laki-Laki</a></li>
                                       <li><a href="#" data-value="P">Perempuan</a></li>
                                   </ul>
                               </div>
                        @if ($errors->has('jenis_kelamin'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="panel-heading">
                    <h3 class="panel-title">Foto Profil</h3>
                </div>

                <img src="{{ asset('storage/' . (count($errors) > 0 ? old('ava') : Auth::user()->avatar)) }}" class="img-circle img-ava" style="width:100px;height:100px" id="avatar"/>
                <button class="btn btn-primary" type="button" id="ava-chooser"><i class="fa fa-image"></i> Pilih foto</button>
                <input type="hidden" name="ava" id="ava" value="{{ count($errors) > 0 ? old('ava') : Auth::user()->avatar }}"/>
                <div class="panel-heading" style="margin-top:10px">
                    <h3 class="panel-title">Kontak</h3>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">E-mail</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ count($errors) > 0 ? old('email') : Auth::user()->email }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('telp') ? ' has-error' : '' }}">
                    <label for="telp" class="col-md-3 control-label">No. Telp</label>
                    <div class="col-md-6">
                        <input id="telp" type="text" class="form-control" name="telp"
                               value="{{ count($errors) > 0 ? old('telp') : Auth::user()->telp }}" required>

                        @if ($errors->has('telp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('upload.image') }}" method="post" id="form-ava" style="display:none" enctype="multipart/form-data">
                <input type="file" name="image" id="file-ava"/>
            </form>
        </div>
    </div>
@endsection
