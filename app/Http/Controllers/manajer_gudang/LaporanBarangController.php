<?php

namespace App\Http\Controllers\manajer_gudang;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\manajer_gudang\LaporanBarangService;

class LaporanBarangController extends Controller
{
    protected $laporanBarangService;

    public function __construct(LaporanBarangService $laporanBarangService)
    {
        $this->laporanBarangService = $laporanBarangService;
    }

    public function index(Request $request)
    {

        $filters = $request->only(['type', 'start_date', 'end_date']);
        $laporan_barang = $this->laporanBarangService->getLaporanBarang($filters);
       
        return view('pages.manajer_gudang.laporan.laporan_barang', compact('laporan_barang'));
    }

    public function export(Request $request)
    {
        $filters = $request->only(['type', 'start_date', 'end_date']);
        ActivityLogHelper::log('Melakukan export laporan barang');
        return $this->laporanBarangService->exportLaporanBarang($filters);
    }
}
