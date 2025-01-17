<?php

namespace App\Services\admin;

use App\Exports\LaporanStokExport;
use App\Repositories\admin\LaporanStokRepository;
use Maatwebsite\Excel\Facades\Excel;

class LaporanStokService
{
    protected $laporanStokRepository;

    public function __construct(LaporanStokRepository $laporanStokRepository)
    {
        $this->laporanStokRepository = $laporanStokRepository;
    }

    public function getFilteredLaporanStok($request)
    {
        return $this->laporanStokRepository->getFilteredProducts($request);
    }

    public function export($request)
    {

        $laporan_stok = $this->getFilteredLaporanStok($request);
        return Excel::download(new LaporanStokExport($laporan_stok), 'laporan_stok.xlsx');
    }
}
