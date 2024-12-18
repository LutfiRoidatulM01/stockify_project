<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Http\Controllers\Controller;

class StockOpnameController extends Controller
{
    public function index()
    {
        $stock_opname = StockTransaction::all();

        return view('pages.admin.stock_opname.index', compact('stock_opname'));
    }
}
