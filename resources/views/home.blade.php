@extends('layouts.template')

@section('content')
<div class="jumbotron py-4 px-5">
    @if (Session::get('failed'))
    <div class="alert alert-danger">{{ Session::get('failed')}}</div>
    @endif
    <h1 class="display-4">
        Selamat Datang {{Auth::user()->name}}!
    </h1>
    <p>Aplikasi ini di gunakan hanya oleh pegawai administrator APOTEK. di gunakan untuk mengelola data obat, penyetokan, juga pembelian (kasir).</p>
</div>
@endsection