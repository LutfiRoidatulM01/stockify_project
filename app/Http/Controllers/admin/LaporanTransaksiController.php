<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\admin\LaporanTransaksiService;

class LaporanTransaksiController extends Controller
{
    protected $laporanTransaksiService;

    public function __construct(LaporanTransaksiService $laporanTransaksiService)
    {
        $this->laporanTransaksiService = $laporanTransaksiService;
    }

    public function index(Request $request)
    {
       
        $filters = $request->only(['transaction_type', 'start_date', 'end_date']);
        $laporan_transaksi = $this->laporanTransaksiService->getLaporanTransaksi($filters);
        return view('pages.admin.laporan.laporan_transaksi', compact('laporan_transaksi'));
    }

    public function export(Request $request)
    {
        $filters = $request->only(['transaction_type', 'start_date', 'end_date']);
        ActivityLogHelper::log('Melakukan export laporan transaksi');
        return $this->laporanTransaksiService->exportLaporanTransaksi($filters);
    }
    
}
