<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Http\Controllers\Controller;

class StockTransactionController extends Controller
{
    public function index()
    {
        // Ambil data transaksi stok
        $transactions = StockTransaction::all();

        return view('pages.admin.riwayat_transaksi.index', compact('transactions'));
    }
}
