@extends('layout.auth')

@section('title')
    Masuk ke Bukosan
@endsection

@section('content')
    <section id="auth-page" class="container-fluid">
        <div class="row">
            <div class="col-lg-8" id="auth-banner">
                <h3>Mulai Pengalamanmu !</h3>
            </div>
            <div class="col-lg-4" id="auth-box">
                <form action="{{ url('masuk') }}" method="post">
                    {{ csrf_field() }}
                    <label for="username">Username</label>
                    <input type="text" class="form-control neon-ui" name="username" value="{{ old('username') }}" title="username"/>
                    <br/>
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control neon-ui" name="password" title="password"/>
                    <br/>
                    <button type="submit" class="btn btn-primary btn-center">Masuk</button>
                </form>
            </div>
        </div>
    </section>
@endsection
