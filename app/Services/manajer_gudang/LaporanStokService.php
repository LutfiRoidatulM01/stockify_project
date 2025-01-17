<?php

namespace App\Services\manajer_gudang;

use App\Exports\LaporanStokExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanStokManajerExport;
use App\Repositories\manajer_gudang\LaporanStokRepository;

class LaporanStokService
{
    protected $laporanStok;

    public function __construct(LaporanStokRepository $laporanStok)
    {
        $this->laporanStok = $laporanStok;
    }

    public function getFilteredLaporanStok($request)
    {
        return $this->laporanStok->getFilteredProducts($request);
    }

    public function export($request)
    {

        $laporanStok = $this->getFilteredLaporanStok($request);
        return Excel::download(new LaporanStokManajerExport($laporanStok), 'laporan_stok.xlsx');
    }
}
