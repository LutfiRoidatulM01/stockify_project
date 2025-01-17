<?php

namespace App\Services\manajer_gudang;

use App\Repositories\manajer_gudang\LaporanBarangRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanBarangExport;

class LaporanBarangService
{
    protected $laporanBarangRepository;

    public function __construct(LaporanBarangRepository $laporanBarangRepository)
    {
        $this->laporanBarangRepository = $laporanBarangRepository;
    }

    public function getLaporanBarang($filters)
    {
        return $this->laporanBarangRepository->getLaporanBarang($filters);
    }

    public function exportLaporanBarang($filters)
    {
        $data = $this->laporanBarangRepository->getLaporanBarang($filters);

        return Excel::download(new LaporanBarangExport($data), 'laporan_barang.xlsx');
    }
}
