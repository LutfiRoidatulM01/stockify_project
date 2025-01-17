<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanBarangExport implements FromCollection, WithHeadings
{
    protected $laporanBarangData;

    public function __construct($laporanBarangData)
    {
        $this->laporanBarangData = $laporanBarangData;
    }

    public function collection()
    {
        return $this->laporanBarangData->map(function ($laporan) {
            return [
                'Tanggal' => \Carbon\Carbon::parse($laporan->tanggal)->format('d/m/Y'),
                'Transaksi' => $laporan->type,
                'Nama Produk' => $laporan->product->name,
                'Jumlah' => $laporan->quantity,
                'Status' => ucfirst($laporan->status),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Transaksi',
            'Nama Produk',
            'Jumlah',
            'Status',
        ];
    }
}
