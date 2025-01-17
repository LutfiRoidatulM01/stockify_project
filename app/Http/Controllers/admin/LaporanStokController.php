<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\admin\LaporanStokService; // Import LaporanStokService

class LaporanStokController extends Controller
{
    protected $laporanStokService;

    // Constructor untuk menyuntikkan service
    public function __construct(LaporanStokService $laporanStokService)
    {
        $this->laporanStokService = $laporanStokService;
    }

    public function index(Request $request)
    {
        $categories = Category::all();

        $laporan_stok = $this->laporanStokService->getFilteredLaporanStok($request);

        return view('pages.admin.laporan.laporan_stok', compact('laporan_stok', 'categories'));
    }

    public function export(Request $request)
    {
        ActivityLogHelper::log('Melakukan export laporan stok');
        return $this->laporanStokService->export($request);
    }
}
