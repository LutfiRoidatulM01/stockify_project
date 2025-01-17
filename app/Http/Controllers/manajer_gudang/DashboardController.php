<?php

namespace App\Http\Controllers\manajer_gudang;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil tanggal hari ini
        $today = Carbon::today();

        // Ambil barang masuk hari ini
        $barangMasuk = StockTransaction::where('type', 'Masuk')
            ->whereDate('date', $today)
            ->get();

        // Ambil barang keluar hari ini
        $barangKeluar = StockTransaction::where('type', 'Keluar')
            ->whereDate('date', $today)
            ->get();

            $stokMenipis = Product::all()->filter(function ($product) {
                // Periksa apakah stok aktual lebih kecil dari atau sama dengan stok minimum
                return $product->totalStock() <= $product->minimum_stock;
            });

        // Kirim data ke view
        return view('pages.manajer_gudang.index', compact('barangMasuk', 'barangKeluar', 'stokMenipis'));
    }
}
