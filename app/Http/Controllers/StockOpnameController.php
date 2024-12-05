<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockTransaction;

class StockOpnameController extends Controller
{
    public function index()
    {
        $stock_opname = StockTransaction::all();

        return view('pages.admin.stock_opname.index', compact('stok_opname'));
    }
}
