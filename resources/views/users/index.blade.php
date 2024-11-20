@extends('layouts.template')

@section('content')
<h2>Akun Pengguna</h2>
<a href="{{ route('user.create') }}" class="btn btn-warning">Tambah Pengguna</a>
@if (Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>

@endif

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->role}}</td>
            <td>
                <a href="{{ route('user.edit', $user->id)}}" class="btn btn-primary me-3">Edit</a>
                <form action="{{ route('user.destroy', $user->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        @endforeach
    </tbody>
</table>
@endsection