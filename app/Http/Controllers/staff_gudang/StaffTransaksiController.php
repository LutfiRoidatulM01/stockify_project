<?php

namespace App\Http\Controllers\staff_gudang;

use App\Http\Controllers\Controller;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class StaffTransaksiController extends Controller
{
    public function index() {
        $transactions = StockTransaction::all();
        return view('pages.staff_gudang.stok_staff', compact('transactions'));
    }
}
