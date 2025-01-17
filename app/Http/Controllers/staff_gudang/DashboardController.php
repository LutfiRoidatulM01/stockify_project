<?php

namespace App\Http\Controllers\staff_gudang;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $barangMasuk = StockTransaction::where('type', 'Masuk')
            ->where('status', 'pending')
            ->with('product')
            ->get();

        $barangKeluar = StockTransaction::where('type', 'Keluar')
            ->where('status', 'pending')
            ->with('product')
            ->get();


        return view('pages.staff_gudang.index', compact('barangMasuk', 'barangKeluar'));
    }
}
