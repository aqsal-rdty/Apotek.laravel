@extends('layouts.template')
@section('content')

<div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Obat:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" >
        </div>
    </div>

    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Jenis Obat:</label>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga Obat:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" >
        </div>
    </div>

    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Stok Tersedia:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="stock" name="stock" >
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
</form>

@endsection