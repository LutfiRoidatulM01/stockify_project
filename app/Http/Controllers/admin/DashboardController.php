<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Models\StockTransaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProduk = Product::count();

        $jumlahTransaksiMasuk = StockTransaction::where('type', 'Masuk')->count();

        $jumlahTransaksiKeluar = StockTransaction::where('type', 'Keluar')->count();

        $products = Product::select(
            'products.name',
            DB::raw('
                                        SUM(CASE WHEN stock_transactions.type = "Masuk" AND stock_transactions.status = "Diterima" THEN stock_transactions.quantity ELSE 0 END) -
                                        SUM(CASE WHEN stock_transactions.type = "Keluar" AND stock_transactions.status = "Dikeluarkan" THEN stock_transactions.quantity ELSE 0 END) AS stock_quantity
                                    ')
        )
            ->leftJoin('stock_transactions', 'products.id', '=', 'stock_transactions.product_id')
            ->groupBy('products.name')
            ->paginate(10);

        $productNames = $products->pluck('name');
        $stockQuantities = $products->pluck('stock_quantity');

        $today = now()->toDateString(); // Mendapatkan tanggal hari ini dalam format Y-m-d

        $userActivities = UserActivity::with('user')
            ->whereDate('created_at', $today) // Memfilter berdasarkan tanggal hari ini
            ->latest() // Mengurutkan berdasarkan tanggal terbaru
            ->get();

        // Mengirim data ke view
        return view('pages.admin.index', compact(
            'jumlahProduk',
            'jumlahTransaksiMasuk',
            'jumlahTransaksiKeluar',
            'productNames',
            'stockQuantities',
            'products',
            'userActivities'
        ));
    }
}
