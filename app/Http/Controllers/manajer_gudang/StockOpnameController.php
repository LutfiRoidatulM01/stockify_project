<?php

namespace App\Http\Controllers\manajer_gudang;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockOpnameController extends Controller
{
    public function index()
    {
        $stockOpname = Product::with([
            'stockTransactions' => function ($query) {
                $query->whereIn('status', ['diterima', 'dikeluarkan']) // Status diterima atau dikeluarkan
                      ->whereDate('date', Carbon::today()) 
                      ->latest('date') 
                      ->first(); 
            }
        ])->get();
        $stock_opname = Product::paginate(10);
        return view('pages.manajer_gudang.manajer_stock.stock_opname', compact('stock_opname'));
    }
}
