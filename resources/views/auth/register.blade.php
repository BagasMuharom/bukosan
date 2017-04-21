@extends('layout.auth')

@section('title')
    Daftar ke Bukosan
@endsection

@section('content')
    <section id="auth-page" class="container-fluid">
        <div class="row">
            <div class="col-lg-8 hidden-md" id="auth-banner">
                <h3>Mulai Pengalamanmu !</h3>
            </div>
            <div class="col-lg-4" id="auth-box">
                <form action="{{ url('masuk') }}" method="post">
                    {{ csrf_field() }}
                    <label for="username">Username</label>
                    <input type="text" class="form-control neon-ui" name="username" value="{{ old('username') }}" title="username"/>
                    <br/>
                    <label for="username">E-mail</label>
                    <input type="text" class="form-control neon-ui" name="email" value="{{ old('email') }}" title="username"/>
                    <br/>
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control neon-ui" name="password" title="password"/>
                    <br/>
                    <label for="password">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control neon-ui" name="confirmpassword" title="password"/>
                    <br/>
                    <button type="submit" class="btn btn-primary btn-center">Daftar Sekarang</button>
                </form>
            </div>
        </div>
    </section>
@endsection
