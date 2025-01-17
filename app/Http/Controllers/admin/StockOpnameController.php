<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;

class StockOpnameController extends Controller
{
    public function index()
    {
        $stockOpname = Product::with([
            'stockTransactions' => function ($query) {
                $query->whereIn('status', ['diterima', 'dikeluarkan']) // Status diterima atau dikeluarkan
                      ->whereDate('date', Carbon::today()) // Filter transaksi untuk hari ini
                      ->latest('date') // Urutkan berdasarkan tanggal terbaru
                      ->first(); // Ambil hanya transaksi pertama (terbaru)
            }
        ])->get();
        $stock_opname = Product::paginate(10);

        ActivityLogHelper::log('Melakukan stock opname');
        return view('pages.admin.stok.stock_opname', compact('stock_opname'));
    }
}
