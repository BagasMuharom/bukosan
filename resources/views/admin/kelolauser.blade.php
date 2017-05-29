@extends('layouts.user.page')

@section('title')
    Kelola User
@endsection

@section('contents')
    <h3>Kelola User</h3>

    @foreach($users as $user)
        <p>{{ $user->displayname }}</p>
        <a href="{{ route('tangguhkan.user',['id' => $user->id]) }}">{{ $user->ditangguhkan ? 'Batalkan Penangguhan' : 'Tangguhkan' }}</a>
        <a href="{{ route('hapus.user',['id' => $user->id]) }}">Hapus</a>
    @endforeach

    <br/>
    {{ $users->links() }}

@endsection