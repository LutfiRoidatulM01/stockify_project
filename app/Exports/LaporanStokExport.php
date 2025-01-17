<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanStokExport implements FromCollection, WithHeadings, WithMapping
{
    protected $laporanStok;

   
    public function __construct($laporanStok)
    {
        $this->laporanStok = $laporanStok;
    }

    public function collection()
    {
        return $this->laporanStok; // Menggunakan data yang telah difilter
    }

    public function headings(): array
    {
        return [
            'Nama Produk',
            'SKU',
            'Kategori',
            'Stok Masuk',
            'Stok Keluar',
            'Total Stok',
            'Tanggal',
        ];
    }

    public function map($laporan): array
    {
        return [
            $laporan->name,
            $laporan->sku,
            $laporan->category->name,
            $laporan->stok_masuk,
            $laporan->stok_keluar,
            $laporan->totalStock(),
            $laporan->stockTransactions->isNotEmpty()
                ? \Carbon\Carbon::parse($laporan->stockTransactions->last()->date)->format('d/m/Y')
                : '-',
        ];
    }
}
