@extends('layouts.template')
@section('content')
<div class="container mt-3">
<div class="d-flex justify-content-between mb-3">
            <form action="{{ url()->current() }}" method="GET" class="d-flex">
                <div class="d-flex gap-2">
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        value="{{ request('tanggal') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="{{ url()->current() }}" class="btn btn-secondary">Clear</a>
                </div>
            </form>
            @if (Auth::user()->role == 'cashier')
                <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Pembelian Baru</a>
            @endif
        </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">Pembelian Baru</a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Pembeli</th>
                <th>Obat</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
                <th>Tanggal Beli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($orders as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $item['name_customer'] }}</td>
                    <td>
                        <ol>
                            @foreach ($item['medicines'] as $medicine)
                                <li>
                                    {{ $medicine['name_medicine'] }} ({{ number_format($medicine['price'], 0, ',', '.') }}): 
                                    Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }} 
                                    <small>qty {{ $medicine['qty'] }}</small>
                                </li>
                            @endforeach
                        </ol>
                    </td>
                    <td>Rp. {{ number_format($item['total_price'], 0, ',', '.') }}</td>
                    <td>{{ $item['user']['name'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}</td>
                    <td>
                        <a href="{{ route('download.pdf', $item->id)}}" class="btn btn-secondary">Download Struk</a>
                    </td>   
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{-- jika data ada atau > 0 --}}
        @if ($orders->count())
            {{-- munculkan tampilan pagination --}}
            {{ $orders->links() }}
        @endif
    </div>
</div>
@endsection

</div>