<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::orderBy('created_at', 'desc')->get();
    }
    public function headings(): array
    {
        return [
            "Nama Pembeli", "Obat", "Total Bayar", "Kasir", "Tanggal"
        ];
    }
    public function map($item): array
    {
        $dataobat = '';
        if (is_iterable($item->medicine)) {
        foreach ($item->medicine as $value) {
            $format = $value["nama_medicine"] . "(qty" . $value ['qty'] . " : Rp. " . number_format($value['sub_price']) . "),";
            $dataobat .= $format;
        }
        }
        return [
            $item->name_customer,
            $dataobat,
            $item->total_price,
            $item->user->name,
            \Carbon\Carbon::parse($item->created_at)->isoFormat($item->created_at),
        ];
    }
}
