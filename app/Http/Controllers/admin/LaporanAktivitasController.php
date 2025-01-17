<?php

namespace App\Http\Controllers\admin;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\admin\LaporanAktivitasService;

class LaporanAktivitasController extends Controller
{

    protected $laporanAktivitasService;

    public function __construct(LaporanAktivitasService $laporanAktivitasService)
    {
        $this->laporanAktivitasService = $laporanAktivitasService;
    }


    public function index()
    {

        $today = now()->toDateString(); // Mendapatkan tanggal hari ini (format Y-m-d)

        $laporan_aktivitas = UserActivity::with('user')
            ->whereDate('created_at', $today) // Memfilter berdasarkan tanggal hari ini
            ->get();

        return view('pages.admin.laporan.laporan_aktivitas', compact('laporan_aktivitas'));
    }

    public function export()
    {
        return $this->laporanAktivitasService->exportUserActivities();
    }
}
