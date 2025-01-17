<?php

namespace App\Services\admin;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\admin\LaporanAktivitasExport;
use App\Repositories\admin\LaporanAktivitasRepository;

class LaporanAktivitasService
{
    protected $laporanAktivitasRepository;

    public function __construct(LaporanAktivitasRepository $laporanAktivitasRepository)
    {
        $this->laporanAktivitasRepository = $laporanAktivitasRepository;
    }

    public function exportUserActivities()
    {
        $activities = $this->laporanAktivitasRepository->getAllActivities();
        return Excel::download(new LaporanAktivitasExport($activities), 'laporan_aktivitas_user.xlsx');
    }
}
