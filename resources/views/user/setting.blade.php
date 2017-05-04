@extends('layouts.user.page')

@section('title')
    Pengaturan
@endsection

@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">Pengaturan</div>

        <div class="panel-body">
            <form id="settings-form" class="form-horizontal" action="{{ route('settings.process') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Nama Lengkap</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name"
                               value="{{ Auth::user()->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-3 control-label">Username</label>
                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username"
                               value="{{ Auth::user()->username }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">E-mail</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ Auth::user()->email }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
        </div>
    </div>
@endsection
