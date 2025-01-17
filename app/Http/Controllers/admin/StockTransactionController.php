<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Http\Controllers\Controller;

class StockTransactionController extends Controller
{
    public function index()
    {
        $transactions = StockTransaction::with(['product', 'user'])->paginate(10);
      
        return view('pages.admin.stok.riwayat_transaksi', compact('transactions'));
    }
}
