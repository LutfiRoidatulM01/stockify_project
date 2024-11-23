<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockTransaction;

class StockTransactionController extends Controller
{
    public function index()
    {
        // Ambil data transaksi stok
        $transactions = StockTransaction::all();

        return view('pages.admin.riwayat_transaksi.index', compact('transactions'));
    }
}
