@extends('layouts.template')
@section('content')
<div class="container mt-3">
    <form action="{{ route('tambah.store')}}" class="card m-auto p-5" method="POST">
        @csrf
        {{--validasi error--}}
        @if($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif


        <p>Penanggung Jawab: <b>{{ Auth::user()->name }}</b></p>
        <div class="mb-3 row">
            <label for="name_customer" class="col-sm-2 col-form-label">Nama Pembeli</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_customer" name="name_customer"
                    value="{{ old('name_customer')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="medicines" class="col-sm-2 col-form-label">Obat</label>
            <div class="col-sm-10">
                @if (isset($before))
                    @foreach ($before->medicines as $key => $value)
                        <div class="d-flex" id="medicines-{{ $key }}">
                            <select name="medicines[]" id="medicines" class="form-select mb-2">
                                @foreach ($medicines as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                            @if ($key > 0)
                                <div class="text-danger p-4" style="cursor: pointer;"
                                    onclick="deleteSelect('medicines-{{ $key }}')">
                                    X
                                </div>
                            @endif
                        </div>
                        <br>
                    @endforeach
                @else
                    <select name="medicines[]" class="form-select">
                        <option selected hidden disabled>Pesanan 1</option>
                        @foreach ($medicines as $item)
                            <option value="{{ $item['id'] }}" @if(in_array($item['id'], old('medicines', []))) selected @endif>
                                {{ $item['name'] }}</option>
                        @endforeach
                    </select>
                @endif
                <div class="medicines-wrap"></div>
                <br>
                <p style="cursor:pointer" class="text-primary" id="add-select">+ Tambah Obat</p>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-lg btn-primary">Konfirmasi Pembelian</button>
    </form>
</div> <!-- Penutup div container -->
@endsection

@push('script')
    <script>
        let no = 2;
        $("#add-select").on("click", function () {
            //ini di isi dengan tag html yang nantinya ditambahkan/muncul
            let html = `<br><select name="medicines[]" id="medicines" class="form-select">
                    <option selected hidden disabled>Pesanan ${no}</option>
                    @foreach ($medicines as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                    </select>`
            $(".medicines-wrap").append(html)
            no++;
        })
    </script>
@endpush