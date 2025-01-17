<?php

namespace App\Services\admin;

use App\Exports\admin\LaporanTransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\admin\LaporanTransaksiRepository;

class LaporanTransaksiService
{
    protected $laporanTransaksiRepository;

    public function __construct(LaporanTransaksiRepository $laporanTransaksiRepository)
    {
        $this->laporanTransaksiRepository = $laporanTransaksiRepository;
    }

    public function getLaporanTransaksi($filters)
    {
        return $this->laporanTransaksiRepository->getLaporanTransaksi($filters);
    }

    public function exportLaporanTransaksi($filters)
    {
        $data = $this->laporanTransaksiRepository->getLaporanTransaksi($filters);
        return Excel::download(new LaporanTransaksiExport($data), 'laporan_transaksi.xlsx');
    }

    
}
