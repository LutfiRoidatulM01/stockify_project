<?php

namespace App\Exports\admin;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanTransaksiExport implements FromCollection, WithHeadings
{
    protected $transactions;

    public function __construct(Collection $transactions)
    {
        $this->transactions = $transactions;
    }

    public function collection()
    {
        return $this->transactions->map(function ($transaction) {
            return [
                'Nama Produk' => $transaction->product->name,
                'Transaksi' => $transaction->type,
                'Jumlah' => $transaction->quantity,
                'Status' => ucfirst($transaction->status),
                'Tanggal' => \Carbon\Carbon::parse($transaction->date)->format('d/m/Y'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Produk',
            'Transaksi',
            'Jumlah',
            'Status',
            'Tanggal',
        ];
    }
}
