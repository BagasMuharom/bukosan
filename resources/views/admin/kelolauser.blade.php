@extends('layouts.user.page')

@section('title')
    Kelola User
@endsection

@section('contents')
    <h3>Kelola User</h3>
	
	<table class="table-ui">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
		@foreach($users as $user)
            <tr>
                <td><b>{{ $user->displayname }}</b></td>
                <td>{{ $user->alamat }}</td>
                <td class="aksi">
                    <div class="x-group-btn">
                        <a href="{{ route('tangguhkan.user',['id' => $user->id]) }}" class="btn btn-warning">{{ $user->ditangguhkan ? 'Batalkan Penangguhan' : 'Tangguhkan' }}</a>
						<a href="{{ route('hapus.user',['id' => $user->id]) }}" class="btn btn-danger delete-user">Hapus</a>
                    </div>
                </td>
            </tr>
		@endforeach
        </tbody>
    </table>


    {{ $users->links() }}

@endsection

@section('js')
<script src="{{ asset('js/admin.js') }}"></script>
@endsection