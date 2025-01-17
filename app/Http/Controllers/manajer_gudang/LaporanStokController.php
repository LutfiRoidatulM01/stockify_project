<?php

namespace App\Http\Controllers\manajer_gudang;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use App\Services\manajer_gudang\LaporanStok;
use App\Services\manajer_gudang\LaporanStokService;

class LaporanStokController extends Controller
{
    protected $laporanStok;

    // Constructor untuk menyuntikkan service
    public function __construct(LaporanStokService $laporanStok)
    {
        $this->laporanStok = $laporanStok;
    }

    public function index(Request $request)
    {
        $categories = Category::all();

        $laporan_stok = $this->laporanStok->getFilteredLaporanStok($request);

        return view('pages.manajer_gudang.laporan.laporan_stok', compact('laporan_stok', 'categories'));
    }

    public function export(Request $request)
    {
        ActivityLogHelper::log('Melakukan export laporan stok');
        return $this->laporanStok->export($request);
    }
}
